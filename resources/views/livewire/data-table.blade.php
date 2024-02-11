<div>
<div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Todo Data Table
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>To do Name</th>
                            <th>Date</th>
                            <th>Action</th>
                            
                            
                        </tr>
                    </thead>
                    
                    <tbody>

                    @foreach ($dataTable as $dataTable)
                        <tr>
                            <td>{{$dataTable->id}}</td>
                            <td>{{$dataTable->name}}</td>
                            <td>{{$dataTable->created_at->format('D/M/Y')}}</td>
                            <td><a href="" class="btn btn-danger"><i class="fas fa-trash"></i>Delete</a>
                            <a href="" class="btn btn-info"><i class="fas fa-edit"></i>Edit</a></td>
                       
                            
                        </tr>
                    @endforeach
                        
                       
                    </tbody>
                </table>
            </div>
        </div>
</div>
