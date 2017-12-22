<style>
#myTable.dataTable tbody tr{
    cursor:pointer;
}
</style>
<table id="myTable" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Người đặt</th>
                <th>Ngày đặt</th>
                <th>Nơi nhận</th>
                <th>Ghi chú của khách</th>
                <th>SĐT</th>
                <th>Tổng tiền (VNĐ)</th>
                <th>Tình trạng</th>
                <th>Ghi chú</th>

            </tr>
        </thead>

        <tbody>
        @foreach ($list_invoice as $item)
            <tr class="invoice_line" data-name="{{$item->ho_ten}}" data-stt="{{$item->trang_thai}}" data-id="{{$item->id}}" data-toggle="modal" data-target="#detail_invoice">
                <td>{{$item->ho_ten}}</td>
                <td>{{$item->created_at}}</td>
                <td>{{$item->dia_chi}}</td>
                <td>{{$item->ghi_chu_KH}}</td>
                <td>{{$item->SDT}}</td>
                <td>{{  number_format($item->tong_tien, 0,'', ',') }}</td>
                @if($item->trang_thai == "Đã hủy")
                <td  class="text-danger ">{{$item->trang_thai}}</td>
                @elseif($item->trang_thai == "Hoàn tất")
                <td class="text-success stt_ht">{{$item->trang_thai}}</td>
                @elseif($item->trang_thai == "Đang giao")
                <td class="text-blue ">{{$item->trang_thai}}</td>
                @else($item->trang_thai == "Đang giao")
                <td class="text-warning ">{{$item->trang_thai}}</td>
                @endif
                 <td>{{$item->ghi_chu_BH}}</td>
            </tr>
        @endforeach

        </tbody>
    </table>
