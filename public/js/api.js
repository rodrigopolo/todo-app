function apiCom(ops){
	this.options = ops;
}

apiCom.prototype.get = function(route, cb){
	this._com(1, route, null, cb);
}

apiCom.prototype.post = function(route, data, cb){
	if(typeof(data)=='function'){
		cb = data;
		data = null;
	}
	this._com(2, route, data, cb);
}

apiCom.prototype._com = function(method, route, data, cb){
	var self = this;
	var options = {
		type: 'GET',
		url: self.options.endpoint+'/'+route,
		success: function(json_data){
			if(json_data.status){
				cb(json_data);
			}
		},
		failure: function(errMsg) {
			self.options.error(errMsg);
		}
	}
	if(method==2){
		options.type = 'POST';
		options.data = (data)?data:null;
	}
	$.ajax(options);
}