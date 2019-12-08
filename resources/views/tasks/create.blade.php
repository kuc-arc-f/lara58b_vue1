
@extends('layouts.app')

@section('title', '新規作成')

@section('content')
<div id="app">
    新規作成
    {!! Form::model($task, [
        'route' => 'tasks.store', 'method' => 'post', 'class' => 'form-horizontal'
    ]) !!}
    {!! Form::close() !!}   
    <div class="form-group">
        {!! Form::label('name', 'タスク名', ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-6">
            <input type="text" class="form-control" id="name" v-model="name">
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-6">
            <button class="btn btn-outline-primary" v-on:click="send_post">投稿
            </button>                    
        </div>
    </div>
</div>
<!-- -->
<script>
new Vue({
    el: '#app',
    created () {
    },    
    data: {
        name:'',
//        content:''        
    },
    methods: {
        send_post(){
//            var token = $('input[name="_token"]').val();
//console.log(token );            
            var task = {
                'name': this.name,
                'complete' : 0,
//                '_token' : token,
            };
            axios.post('/api/tasks/add' , task ).then(res => {
                console.log(res.data );
//                window.location.href = '/todos';
            });
        },        
    }

});
</script>
@endsection
