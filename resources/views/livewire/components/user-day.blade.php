<div>


    <div class="modal fade text-left" id="userday" tabindex="-1" role="dialog"
         aria-labelledby="myModalLabel17" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel17">Tushlik qo'shish</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('dayUserStore')}}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <select name="user_id" id="" class="form-control" required>
                                @foreach($users as $user)
                                    @if($user->id != 1)
                                    <option value="{{$user->id}}"  @if($user->id == auth()->user()->id)selected @endif>{{$user->firstname}} {{$user->lastname}}</option>
                                    @else
                                    <option disabled selected>Foydalanuvchilar </option>

                                    @endif

                                    @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <select name="food_id" id="" class="form-control" required>
                                <option disabled selected>Taomlar</option>
                                @foreach($foods as $food)
                                    <option value="{{$food->id}}"> {{$food->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <select name="day_id" id="" class="form-control" required>
                                <option disabled selected>Kunlar</option>
                                @foreach($days as $day)
                                    <option value="{{$day->id}}"> {{$day->day}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <select class="form-control" id="basicSelect" name="is_pay" required>

                                <option value="0" {{isset($userday)? ($userday->is_pay == '0' ? 'selected' : ' ') :' '}}>To'lanmagan</option>
                                <option value="1" {{isset($userday)? ( $userday->is_pay == '1' ? 'selected' : ' ') :' '}}}>To'langan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <select class="form-control" id="basicSelect" name="yegan_yemagan" required>

                                <option value="0">Kelmadi</option>
                                <option value="1" >Keldi</option>
                            </select>
                        </div>


                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" >Qo'shish</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
