<table class="table tbnew">
    
    <thead>
        <tr>
            <th style="width: 90px;"><strong>ID</strong></th>
            <th><strong>Tran.ID</strong></th>
            <th><strong>Date</strong></th>
            <th><strong>Acc. Name</strong></th>
            <th><strong>SRC. Name</strong></th>
            <th><strong>DVR. Name</strong></th>
            <th><strong>CMM. Name</strong></th>
            <th><strong>DES. Name</strong></th>
            <th><strong>Weight 1 (KG)</strong></th>
            <th><strong>Weight 2 (KG)</strong></th>
        </tr>
    </thead>
    <tbody>
        @forelse ($readings as $key => $data)
        <tr>
            <td>{{$key + 1}}</td>
            <td>{{$data->readingId}}</td>
            <td>{{\Carbon\Carbon::parse($data->created_at)->toFormattedDateString()}}</td>
            <td>{{$data->accountName}}</td>
            <td>{{$data->sourceName}}</td>
            <td>{{$data->driverName}}</td>
            <td>{{$data->commodityName}}</td>
            <td>{{$data->destinationName}}</td>
            <td><strong>{{number_format($data->weight, 2)}}</strong></td>
            <td><strong>{{number_format($data->second ? $data->second->weight : 0, 2)}}</strong></td>
        </tr>
        @empty
        <tr>
            <td colspan="8">No data available</td>
        </tr>
        @endforelse
        @for ($i=0; $i<4; $i++)
        <tr>
            <td colspan="8"></td>
        </tr>
        @endfor
    </tbody>
</table>