@extends('layouts.app')
@section('title', 'タスク一覧')

@section('content')
<div id="app">
    <div class="panel panel-default">
        <div class="panel-heading">
            タスク一覧 - 2222
        </div>
        <div class="panel-body">
            <table class="table table-striped">
                <thead>
                    <th>タスク名</th>
                    <th>完了</th>
                    <th>編集</th>
                    <th>削除</th>
                </thead>
                <tbody v-for="task in tasks" v-bind:key="task.id">
                    <tr>
                        <td>
                        <h4>
                            <a v-bind:href="'/tasks/' + task.id">@{{ task.name }}
                            </a>
                        </h4>
                        </td>
                        <td>&nbsp;</td>
                        <td>
                            <a v-bind:href="'/tasks/' + task.id + '/edit'">@{{ task.name }}
                            </a>
                        </td>
                    </tr>                    
                </tbody>
            </table>
            <br />
            new:<br />
            {{ link_to_route('tasks.create', '[ create ]' ) }}
            <br />
            <br />
            <a href="make/"  class="btn btn-primary ">詳細はこちら </a>
        </div>
    </div>
</div>
<!-- -->
<script>
new Vue({
    el: '#app',
    created () {
        this.getTasks(0);
    },    
    data: {
        tasks : [],
    },
    methods: {
        getTasks (complete) {
            axios.get('/api/tasks')
                .then(res =>  {
                    this.tasks = res.data
console.log(res.data )
            })            
        },
    }
});
</script>
@endsection
