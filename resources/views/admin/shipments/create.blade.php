@extends('layouts.admin_sidebar')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-10 col-sm-12 col-md-12">
        <div class="block block-content block-content-full">
            <div class="block-header block-header-default">
                <h3 class="block-title">Create Shipment</h3>
            </div>
            <div class="block-content">
                <form action="{{ route('admin.shipments.store') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <h4 class="font-w300">
                                Sender Information
                            </h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="sn">Name</label>
                                <input type="text" class="form-control @error('sender_name') is-invalid @enderror"
                                    id="sn" name="sender_name" placeholder="Enter name of sender.." required>
                                @error('sender_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="sp">Phone</label>
                                <input type="text" class="form-control @error('sender_phone') is-invalid @enderror"
                                    id="sp" name="sender_phone" placeholder="Enter phone number of sender.." required>
                                @error('sender_phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="sp">State</label>
                                <input type="text" class="form-control @error('sender_state') is-invalid @enderror"
                                    id="sp" name="sender_state" placeholder="Enter state of sender" required>
                                @error('sender_state')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <label class="col-12" for="example-textarea-input">Address</label>
                            <textarea class="form-control @error('sender_address') is-invalid @enderror"
                                id="example-textarea-input" name="sender_address" rows="3"
                                placeholder="Enter address of sender" required></textarea>
                            @error('sender_address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-12">Is the address above also the pickup address?</label>
                        <div class="col-12">
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="isPickupAddress"
                                    id="example-inline-radio1" value="YES" checked onclick="handleClick(this);">
                                <label class="custom-control-label" for="example-inline-radio1">Yes</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="isPickupAddress"
                                    id="example-inline-radio2" value="NO" onclick="handleClick(this);">
                                <label class="custom-control-label" for="example-inline-radio2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row" id="newPickupAddress" style="display: none">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="ps">State</label>
                                <input type="text" class="form-control" id="ps" name="pickup_state"
                                    placeholder="Enter pickup state">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <label class="col-12" for="example-textarea-input">Pickup Address</label>
                            <textarea class="form-control" id="example-textarea-input" name="pickup_address" rows="3"
                                placeholder="Where do you want us to pick up the item for dispatch?"></textarea>
                        </div>
                    </div>

                    <hr>
                    <div class="row">
                        <div class="col-12">
                            <h4 class="font-w300">
                                Receiver Information
                            </h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="rn">Name</label>
                                <input type="text" class="form-control @error('receiver_name') is-invalid @enderror"
                                    id="rn" name="receiver_name" placeholder="Enter name of receiver.." required>
                                @error('receiver_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="sp">Phone</label>
                                <input type="text" class="form-control @error('receiver_phone') is-invalid @enderror"
                                    id="rp" name="receiver_phone" placeholder="Enter phone number of receiver.."
                                    required>
                                @error('receiver_phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="sp">Email</label>
                                <input type="email" class="form-control @error('receiver_email') is-invalid @enderror"
                                    id="rp" name="receiver_email" placeholder="Enter email of receiver.." required>
                                @error('receiver_email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="sp">State</label>
                                <input type="text" class="form-control @error('receiver_state') is-invalid @enderror"
                                    id="rp" name="receiver_state" placeholder="Enter email of receiver.." required>
                                @error('receiver_state')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row form-group">
                        <label class="col-12" for="example-textarea-input">Address</label>
                        <div class="col-12">
                            <textarea class="form-control @error('receiver_address') is-invalid @enderror"
                                id="example-textarea-input" name="receiver_address" rows="3"
                                placeholder="Address of receiver" required></textarea>
                            @error('receiver_address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-12">
                            <h4 class="font-w300">
                                Parcel Information
                            </h4>
                        </div>
                    </div>

                    <div class="row form-group">
                        <label class="col-12" for="example-textarea-input">Describe your item(s)</label>
                        <div class="col-12">
                            <textarea class="form-control @error('description') is-invalid @enderror"
                                id="example-textarea-input" name="description" rows="3"
                                placeholder="Tell us about what you are transporting ( e.g. how delicate is it? the quanity etc)"
                                required></textarea>
                            @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>


                    <div class="form-group">
                        <button type="submit" class="btn btn-alt-primary">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
@endsection
@section('script')
<script>
    var currentValue = 'YES';
        function handleClick(myRadio) {
            currentValue = myRadio.value;
            if(currentValue == 'NO'){
                $('#newPickupAddress').show()
            }else{
                $('#newPickupAddress').hide()
            }
        }

</script>
@endsection
