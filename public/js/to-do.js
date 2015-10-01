var xxxxx;



$(function(){


	/**
	 * API Communication
	 **/


	// New API connection
	var api = new apiCom({
		endpoint: wroot,
		error: function(e){
			console.log('Error:');
			console.log(e);
		}
	});

	// Get all To-Dos on load
	api.get('todos',function(data){
		populateTodos(data.todos);	
	});

	// Create new To-Do
	function newTodo(str, cb){
		api.post('todos/new',{
			text: str
		},function(data){
			cb(data.todo);
		});
	}

	// Update To-Do Text
	function updateTodoText(id, str){
		api.post('todos/update/'+id,{
			text: str
		},function(data){
			//
		});
	}

	// Update To-Do Status
	function updateTodoStatus(id, is_done, cb){
		api.post('todos/update/'+id,{
			done: is_done
		},function(data){
			cb();
		});
	}

	// Delete To-Do
	function deleteToDo(id, cb){
		api.post('todos/delete/'+id, function(data){
			cb();
		});
	}


	/**
	 * DOM functions
	 **/


	// Check new To-Do
	function checkNew(){
		var txt = main_input.val().trim();
		if(txt !=''){
			addTodo(txt)
		}
		main_input.val('');
	}

	// Check empty lists
	function checkEmptyList(element){
		if(element.children().length<2){
			element.find('.empty').slideDown();
		}else{
			element.find('.empty').slideUp();
		}
	}

	// Populate To-Dos list
	function populateTodos(todos){
		todos.forEach(function(todo){
			var into_list = (todo.done)?'#done':'#todo';
			var checked = (todo.done)?' checked':'';
			var new_item = $('<li class="list-group-item" id="'+todo.id+'"><input type="checkbox"'+checked+'>&nbsp;<span class="edit" contenteditable="true">'+todo.text+'</span></li>');
			$(into_list).prepend(new_item);
		});
		checkEmptyList($('#todo'));
		checkEmptyList($('#done'));
	}

	// Call `newTodo` and run the callback
	function addTodo(str){
		newTodo(str, function(todo){
			main_input.text('')
			var new_item = $('<li class="list-group-item" id="'+todo.id+'" style="display:none;"><input type="checkbox">&nbsp;<span class="edit" contenteditable="true">'+todo.text+'</span></li>');
			$('#todo').prepend(new_item);
			checkEmptyList($('#todo'));
			$('#'+todo.id).slideDown();			
		});
	}

	// Call `deleteToDo` and run the callback
	function removeTodo(id, element){
		deleteToDo(id, function(){
			element.slideUp(function(){
				var parent = element.parent();
				element.remove();
				checkEmptyList(parent);
				main_input.focus();
			});		
		});
	}


	/**
	 * DOM elements and triggers
	 **/

	// New To-do input
	var main_input = $('#new_todo');

	main_input.focusout(function(){
		checkNew();
	}).on( "keydown", function(event) {
		if(event.which == 13){
			checkNew();
		}
	});

	$('#new_todo_btn').click(function(){
		checkNew();
	});


	// Check and uncheck
	$('body').on('click', 'input[type="checkbox"]', function(e){
		var self = $(this);
		var item = self.parent();
		var text = item.find('.edit').text();
		var id   = item.attr('id');

		var into_list = (this.checked)?'#done':'#todo';
		var checkbox = (this.checked)?' checked':'';
		var new_item = $('<li class="list-group-item" id="'+id+'" style="display:none;"><input type="checkbox"'+checkbox+'>&nbsp;<span class="edit" contenteditable="true">'+text+'</span></li>');

		updateTodoStatus(id,this.checked, function(){

			item.slideUp(function(){
				item.remove();
				$(into_list).prepend(new_item);
				checkEmptyList($('#todo'));
				checkEmptyList($('#done'));
				$('#'+id).slideDown();
			});

		});

	});

	// Check To-Do lists edition
	$('body').on('keyup', '.edit', function(e){
		var self = $(this);
		var id = self.parent().attr('id');
		if (e.keyCode == '13'){
			if(id){
				updateTodoText(id, self.text());
			}
		}else{
			if(self.text()==''){
				if(id){
					removeTodo(id, self.parent());
				}
			}
		}
	});

	// Check if text is updated
	$('body').on('blur', '.edit', function(e){
		var self = $(this);
		var id = self.parent().attr('id');
		if(id && self.text()!=''){
			updateTodoText(id, self.text());
		}
	});

	// Don't allow breaklines
	$('body').on('keypress', '.edit', function(e){
		if (e.keyCode == 13) {
			e.preventDefault();
			return false;
		}
	});

	// Make list editable on load
	$('.edit').attr('contenteditable',true);

});

 