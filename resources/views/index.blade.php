

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">

                <div class="card-body">

                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>fullname</th>
                                <th>phone</th>
                                <th>age</th>
                                <th>gender</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($User as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->fullname }}</td>
                                <td>{{ $item->phone }}</td>
                                <td>{{ $item->age }}</td>
                                <td>{{ $item->gender }}</td>
                                <td>
                                    <a href="" class="btn btn-primary btn-sm">Edit</a>
                                </td>
                                <td>
                                    <a href="" class="btn btn-danger btn-sm">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>

