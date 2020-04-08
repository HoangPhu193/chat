<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="csrf-token" content="{{ csrf_token() }}" >
	<title></title>
	<link rel="stylesheet" href="{{asset('css/app.css')}}">
	<style>
		.list-group {
			max-height: 200px;
			overflow: auto;
		}
		
	</style>
</head>
<body>
	<div class="container">
		<div class="row" id="app">
			<div class="offset-md-4 col-md-4">
				<li class="list-group-item active">Chat Room <span class="badge badge-pill badge-warning">@{{numberUser}}</span></li>
				<div class="badge badge-pill badge-primary">@{{ typing }}</div>
				<ul class="list-group" v-chat-scroll>
				  <message 
				  v-for="value,index in chat.message"
				  :key="value.index"
				  :color=chat.color[index]
				  :user= chat.user[index]
				  :time = chat.time[index]
				  >
				  	@{{value}}
				  </message>
				</ul>
				<input type="text" placeholder="Enter message" class="form-control" v-model="message" @keyup.enter="send">
				<a href="" class="btn btn-danger btn-sm" @click.prevent="deleteMessage">Delete Message</a>
			</div>
		</div>
	</div>
	<script src="{{ asset('js/app.js')}}" type="text/javascript" charset="utf-8" async defer></script>
</body>
</html>