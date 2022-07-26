<div class="modal fade" id="delmodal">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <h4 class="modal-title">Hapus</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
              <form role="form" enctype="multipart/form-data" method="post" action="{{url('voter/hapus')}}">
                  @csrf
                  <div class="card-body">
                      <div class="form-group">
                         <select name="kriteria_hapus" id="" class="form-control" style="width: 100%">
                           <option value="-">-- Pilih Kriteria --</option>
                           <option value="0"> Hapus Semua</option>
                           <option value="1"> Sudah Voting</option>
                           <option value="2"> Belum Voting</option>
                         </select>
                      </div>
                  <div class="modal-footer justify-content-between">
                      <button type="button" class="btn btn-danger" data-dismiss="modal">X</button>
                      <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                  </div>
              </form>
          </div>

      </div>
      <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>