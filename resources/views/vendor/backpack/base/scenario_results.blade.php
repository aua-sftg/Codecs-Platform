<hr>
<div class="container mt-3">
    <h5 class="title">
        Search results : {{$results->count()}}
        [
            Fairshare: {{$results->where('vendor','=','fairshare')->count()}} ,
            Smartakis: {{$results->where('vendor','=','smartakis')->count()}} ,
            Desira: {{$results->where('vendor','=','desira')->count()}},
            Nutricheck: {{$results->where('vendor','=','nutricheck')->count()}}
        ]</h5>
    <div class="row">
        <div class="col-12" style="max-height: 500px; overflow: scroll;">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th scope="col">Vendor</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($results as $result)

                        <tr>
                            <th scope="row">
                                {{$result['vendor']??'n.a'}}
                            </th>
                            <td>{{$result['title']??'n.a'}}</td>
                            <td>{{$result['desc']??'n.a'}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</div>
