@extends('frontend.pages.main')
@section('main')
       <center><h1>Welcome to your profile</h1></center>

       <div class="userprofile">
        <div class="small-conatiner">
            <div class="conatiner">
                <div class="row">
                    <div class="col-2">
                        <div class="form-user-profile">

                            {{-- <input type="hidden" name="edit_id" value="<?php echo $row13['id']; ?>"> --}}
                            <div class="form-group">
                                <label>Name:</label>
                                <h4>{{$data->name}}</h4><br>
                            </div>
                            <div class="form-group">
                                <label>Username</label>
                                <h4>{{$data->username}}</h4><br>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <h4>{{$data->Email}}</h4><br>
                            </div>
                            <div class="form-group">
                                <label>Phone No.</label>
                                <h4>{{$data->phone}}</h4><br>
                            </div>
                            <a href={{url('/')}}>Home</a><br><br>
                            <a href="logout">Log Out</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

@endsection
