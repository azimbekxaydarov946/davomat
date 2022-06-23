<div>
    <div class="modal fade" id="food" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Ovqat qo'shish</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('foodStore')}}" method="post" >
                    <div class="modal-body">
                        @csrf
                        <div class="form-group">
                            <input type="text" class="form-control" name="name" placeholder="Nomi">

                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="price" placeholder="Narxi" >
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Qo'shish</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
