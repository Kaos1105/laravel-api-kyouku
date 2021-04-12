<div class="col-md-12" id="table">
    <table class="table text-center m-auto">
        <tr class="table">
            <th>行</th>
            <th>メール</th>
            <th>状態</th>
            <th>原因</th>
        </tr>

        @foreach($dataImport as $data)
            <tr style=" {{(count($data['reason']) !== 0) ?
                                                'background: #f2dede;color: black;' : ''}} ">
                <td>{{$data['row']}}</td>
                <td>{{$data['email']}}</td>
                <td>{{$data['status']}}</td>
                <td>
                    @if(count($data['reason']))
                        @foreach($data['reason'] as $reasons)
                            @isset($reasons)
                                @foreach($reasons as $reason)
                                    {{isset($reason) ? $reason : ''}}<br>
                                @endforeach
                            @endisset
                        @endforeach
                    @endif
                </td>
            </tr>
        @endforeach
    </table>
</div>