@extends('layouts.app')

@section('title', "")

@section('content')
<div id="app">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h1>Edit</h1>
        </div>
        <div class="panel-body">
                <div class="form-group">
                    {!! Form::label('title', 'タスク名',
                     ['class' => 'col-sm-3 control-label']) !!}
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="title" v-model="title" >
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('content', 'content',
                     ['class' => 'col-sm-3 control-label']
                    ) !!}
                    <textarea class="form-control" id="content" rows="3"
                     v-model="content"></textarea>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-6">
                        <button v-on:click="postTask">投稿</button>
                    </div>
                </div>
        </div>
        <div class="panel-footer">
            {{ link_to_route('tasks.index', '戻る') }}
        </div>
    </div>
</div>
<!-- -->
<script>
new Vue({
    el: '#app',
    created () {
    },  
    mounted: function() {
        this.getItem();
    },      
    data: {
        item: null,
        title: '',
        content  : '',
    },
    methods: {
        getItem: function() {
            axios.get('/api/tasks/show/' + {{$task_id}} )
            .then( ( res ) => {
                this.item = res.data;
                this.title = this.item.title;
                this.content = this.item.content;
//console.log(this.item );
            });
        },     
        postTask(){
            var task = {
                'title': this.title,
                'content': this.content
            };
            axios.post('/api/tasks/update/'+ {{$task_id}} ,task).then(res => {
                console.log(res.data.title);
                console.log(res.data.content);
            });
        },    
    }
});
</script>

@endsection
