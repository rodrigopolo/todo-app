<?php
layout('boilerplate/default.php');
script($wroot.'/js/api.js');
script($wroot.'/js/to-do.js');
?>
<h3><span class="glyphicon glyphicon-check" aria-hidden="true"></span> To-Do List</h3>
<div class="form-group">
	<div class="input-group">
		<input id="new_todo" name="new_todo" type="text" class="form-control" placeholder="Nuevo pendiente">
		<span id="new_todo_btn" class="input-group-addon">
			<span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span>
		</span>
	</div>
</div>

<p>Pendientes</p>
<ul class="list-group" id="todo">
	<li class="list-group-item empty" style="display:none;">Sin items.</li>
</ul>

<p>Terminado</p>
<ul class="list-group" id="done">
	<li class="list-group-item empty" style="display:none;">Sin items.</li>
</ul>



