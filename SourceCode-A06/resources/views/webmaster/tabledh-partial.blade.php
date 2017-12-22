<style>
#myTable tbody tr{
    cursor:pointer;
}
</style>

<table id="myTable" class="display" cellspacing="0" width="100%" >
        <thead>
            <tr>
                <th>Người đặt</th>
                <th>Họ Tên</th>
                <th>Ngày đặt</th>
                <th>Tổng tiền (VNĐ)</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Người đặt</th>
                <th>Họ Tên</th>
                <th>Ngày đặt</th>
                <th>Tổng tiền (VNĐ)</th>
            </tr>
        </tfoot>


        <tbody>
          @foreach ($list_invoice as $item)
              <tr id="{{$item->id_hd}}" name="{{$item->id_m}}" data-toggle="modal" data-target="#myModal"  class="invoice_line xemchitiet" data-name="{{$item->ho_ten}}" data-stt="{{$item->trang_thai}}" data-id="{{$item->id}}" data-toggle="modal" data-target="#detail_invoice">
                  <td>{{$item->merchant->ten_dang_nhap}}</td>
                  <td>{{$item->merchant->ho_ten}}</td>
                  <td>{{$item->hoadon->created_at}}</td>
                  <td>{{  number_format($item->SUM, 0,'', ',') }}</td>
              </tr>
          @endforeach

        </tbody>


    </table>
    <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
              <div class="modal-content" id="cthd-container">
                @isset($detail_invoice)
                @include('webmaster.modalctdh-partial');
                @endisset
              </div>
            </div>
          </div>

    <script>
      $(document).ready(function() {
        $('#myTable').DataTable({
            "language": {
          "url": "https://cdn.datatables.net/plug-ins/1.10.16/i18n/Vietnamese.json",
        },
        "order": [ 2, 'desc' ],
      });
      });

      $(".xemchitiet").click(function(event) {
        event.preventDefault();
        var id =  $(this).attr('id');
        var id_m = $(this).attr('name');
        //console.log(id);
       $.ajax({
         url: '/webmaster/xemchitietdhwithmwebmaster',
         type: 'GET',
         dataType : 'html',
         data: {id_hd: id , idm : id_m  },
         success:function(data) {
           $("#cthd-container").html(data);
           //console.log('du');
         }
     })
   });
    </script>
