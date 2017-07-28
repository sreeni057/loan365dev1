@extends("admin::main")
@section('css')
<link rel="stylesheet" href="{{asset('assets/coach/css/jquery-ui.css')}}">
<script src="http://demo.itsolutionstuff.com/plugin/jquery.js"></script>
<script src="http://demo.itsolutionstuff.com/plugin/croppie.js"></script>
<link rel="stylesheet" href="http://demo.itsolutionstuff.com/plugin/bootstrap-3.min.css">
<link rel="stylesheet" href="http://demo.itsolutionstuff.com/plugin/croppie.css">
@stop
@section('content')
<form role="form" class="col-md-offset-3 col-md-7 col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1 " id="myAwesomeForm"  method="post" enctype= multipart/form-data>
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    @if(Session::has('message'))
        <p>{{ Session::get('message') }}</p>
    @endif
	<div class="tab-content">
        <h2 class="admin-edit-profile-title">Edit Profile</h2>
        <div class="form-horizontal dexel-coach-form">

            <div class="form-group">
                <label for="inputName3" class="col-sm-4">First name</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="fname" name="fname" placeholder="" value="{{old('fname',$user->fname)}}">
                    {!!$errors->first('fname','<span class="form-error">:message</span>')!!}
                </div>
            </div>
			<div class="form-group">
                <label for="inputName3" class="col-sm-4">Last name</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="lname" name="lname" placeholder="" value="{{old('lname',$user->lname)}}">
                    {!!$errors->first('lname','<span class="form-error">:message</span>')!!}
                </div>
            </div>
			<div class="form-group">
                <label for="inputName3" class="col-sm-4">Contact number</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="phone" name="phone" placeholder="" value="{{old('phone',$user->phone)}}">
                    {!!$errors->first('phone','<span class="form-error">:message</span>')!!}
                </div>
            </div>
			<div class="form-group">
                <label for="inputName3" class="col-sm-4">Email</label>
                <div class="col-sm-8">{{$user->email}}
                </div>
            </div>
            <div class="form-group">
                <label for="inputName3" class="col-sm-4">Password</label>
                <div class="col-sm-8">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                    {!!$errors->first('password','<span class="form-error">:message</span>')!!}
                </div>
            </div>
            <div class="form-group">
                <label for="inputName3" class="col-sm-4">Confirm Password</label>
                <div class="col-sm-8">
                    <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm Password">
                    {!!$errors->first('confirm_password','<span class="form-error">:message</span>')!!}
                </div>
            </div>
			<div class="form-group">
                <label for="inputName3" class="col-sm-4">Gender</label>
                <div class="col-sm-8">
                <?php $gender= old('gender',$user->profile->gender); ?>
                @foreach(['M'=>'Male','F'=>'Female','O'=>'Others'] as $key=>$value)
                <?php $selected=''; if($gender == $key) { $selected ='checked="checked"'; } ?>

                    {{$value}}<input type="radio" name="gender" placeholder="" value="{{$key}}" {{$selected}}>&nbsp;
                @endforeach
                     {!!$errors->first('gender','<span class="form-error">:message</span>')!!}
                </div>
            </div>
			<div class="form-group">
                <label for="inputName3" class="col-sm-4">Date of birth</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="dob" name="dob" placeholder="yyyy-mm-dd" value="{{old('dob',date('d-m-Y',strtotime($user->profile->dob)))}}">
                    {!!$errors->first('dob','<span class="form-error">:message</span>')!!}
                </div>
            </div>

            <div class="form-group">
                <label for="inputName3" class="col-sm-4">Profile Picture</label>
                <div class="col-sm-8">
                    <!-- <img src="{{cdn($user->profile->photo)}}" width="100"/>
                    <input type="file" class="form-control" id="photo" name="photo" placeholder="" value="{{old('photo')}}"> -->
                    <div class="panel panel-default">
                      <div class="panel-heading">Profile Picture</div>
                      <div class="panel-body">
                        <div class="row">
                            <div class="col-md-4 text-center">
                                <div id="upload-demo" style="width:350px"></div>
                            </div>
                        </div>
                            <div class="col-md-4" style="padding-top:30px;">
                                <strong>Select Image:</strong>
                                <br/>
                                <input type="file" id="upload">
                                <input type="hidden" name="image_base" class="base_val">
                                <br/>
                            </div>
                      </div>
                    </div>
                    {!!$errors->first('photo','<span class="form-error">:message</span>')!!}
                </div>
            </div>
            <div class="form-group">
                <label for="inputName3" class="col-sm-4">Cover Image</label>
                <div class="col-sm-8">
                    <img src="{{cdn($user->profile->cover_img)}}" height="100" width="100%"/>
                    <input type="file" class="form-control" id="cover_img" name="cover_img" placeholder="" value="{{old('cover_img')}}">
                    {!!$errors->first('cover_img','<span class="form-error">:message</span>')!!}
                </div>
            </div>
            <div class="form-group">
                <label for="inputName3" class="col-sm-4">Tag Line</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="tag_line" name="tag_line" placeholder="" value="{{old('tag_line',$user->profile->tag_line)}}">
                    {!!$errors->first('tag_line','<span class="form-error">:message</span>')!!}
                </div>
            </div>
			<div class="form-group">
                <label for="inputName3" class="col-sm-4">About</label>
                <div class="col-md-6 col-sm-8">
                    <textarea id="about" class="form-control" name="about">{{old('about',$user->profile->about)}}</textarea>
                    {!!$errors->first('about','<span class="form-error">:message</span>')!!}
                </div>
            </div>
			<div class="form-group">
                <label for="inputName3" class="col-sm-4">Address</label>
                <div class="col-sm-8">
					<textarea class="form-control" id="address" name="address[street]">{{old('address.street',$user->profile->address['street'])}}</textarea>
                    {!!$errors->first('address.street','<span class="form-error">:message</span>')!!}
                </div>
            </div>
			<div class="form-group">
                <label for="inputName3" class="col-sm-4">Suburb</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="suburb" name="address[suburb]" placeholder="" value="{{old('address.suburb',$user->profile->address['suburb'])}}">
                    {!!$errors->first('address.suburb','<span class="form-error">:message</span>')!!}
                </div>
            </div>
			<div class="form-group">
                <label for="inputName3" class="col-sm-4">Postal code</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="postal_code" name="address[postal_code]" placeholder="" value="{{old('address.postal_code',$user->profile->address['postal_code'])}}">
                    {!!$errors->first('address.postal_code','<span class="form-error">:message</span>')!!}
                </div>
            </div>
			<div class="form-group">
                <label for="inputName3" class="col-sm-4">State</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="state" name="address[state]" placeholder="" value="{{old('address.state',$user->profile->address['state'])}}">
                    {!!$errors->first('address.state','<span class="form-error">:message</span>')!!}
                </div>
            </div>
			<div class="form-group">
                <label for="inputName3" class="col-sm-4">Country</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="country" name="address[country]" placeholder="" value="{{old('address.country',$user->profile->address['country'])}}">
                    {!!$errors->first('address.country','<span class="form-error">:message</span>')!!}
                </div>
            </div>
            <div class="form-group">
                <label for="inputName3" class="col-sm-4">Expertise</label>
                <div class="col-sm-8">
                <?php $user_experts = $user->expertise()->select('expertise.id')->get(); ?>
                    @foreach($expertise as $expert)
                        <?php 
                            $selected ='';
                            foreach ($user_experts as $user_expert)
                            {
                               if($user_expert->id == $expert->id)
                               {
                                $selected ='checked="checked"';
                                break;
                               }
                            }
                       ?>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <input type='checkbox' name='expert_in[]' value="{{$expert->id}}" {{$selected}} data="expert{{$expert->title}}" id="expert{{$expert->id}}" class="chk"/>
                            <label for="expert{{$expert->id}}"></label>
                            <span class="text-center">{{$expert->title}}</span>
                        </div>
                    @endforeach
                    {!!$errors->first('expert_in','<span class="form-error">:message</span>')!!}
                </div>
            </div>

            <div class="form-group">
                <label for="inputName3" class="col-sm-4">Facebook</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="social_link[facebook]" placeholder="" value="{{old('social_link.facebook',$user->profile->social_link['facebook'])}}">
                    {!!$errors->first('social_link.facebook','<span class="form-error">:message</span>')!!}
                </div>
            </div>
            <div class="form-group">
                <label for="inputName3" class="col-sm-4">Google Plus</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="social_link[gplus]" placeholder="" value="{{old('social_link.gplus',$user->profile->social_link['gplus'])}}">
                    {!!$errors->first('social_link.gplus','<span class="form-error">:message</span>')!!}
                </div>
            </div>
            <div class="form-group">
                <label for="inputName3" class="col-sm-4">Twitter</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="social_link[twitter]" placeholder="" value="{{old('social_link.twitter',$user->profile->social_link['twitter'])}}">
                    {!!$errors->first('social_link.twitter','<span class="form-error">:message</span>')!!}
                </div>
            </div>
            <div class="form-group">
                <label for="inputName3" class="col-sm-4">Instagram</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="social_link[instagram]" placeholder="" value="{{old('social_link.instagram',$user->profile->social_link['instagram'])}}">
                    {!!$errors->first('social_link.instagram','<span class="form-error">:message</span>')!!}
                </div>
            </div>
        </div>

        <ul class="dexel-reg-btn">
            <li class="col-md-12">
                <button type="submit" class="btn btn-primary next-step image_upload" id="register_id">Update</button>
            </li>
        </ul>
        <div class="clearfix"></div>
    </div>
</form>
<script type="text/javascript">
$uploadCrop = $('#upload-demo').croppie({
    enableExif: true,
    viewport: {
        width: 200,
        height: 200,
        type: 'circle'
    },
    boundary: {
        width: 300,
        height: 300
    }
});
$('.cr-image').attr('src','{{cdn($user->profile->photo)}}')
$('#upload').on('change', function () { 
    var reader = new FileReader();
    reader.onload = function (e) {
        $uploadCrop.croppie('bind', {
            url: e.target.result
        }).then(function(){
            console.log('jQuery bind complete');
        });
    }
    reader.readAsDataURL(this.files[0]);
    /*$uploadCrop.croppie('result', {
        type: 'canvas',
        size: 'viewport'
    }).then(function (resp) {
        console.log(resp);
    });*/
    $('.image_upload').attr('type','button');
});
$('.image_upload').on('click', function (ev) {
    $uploadCrop.croppie('result', {
        type: 'canvas',
        size: 'viewport'
    }).then(function (resp) {
        if(resp){

        $('.base_val').val(resp);
        }
        else
        {
         $('.base_val').val(Null);   
        }
        console.log(resp);
        $('.image_upload').attr('type','submit');
        //appendFileAndSubmit(resp);
        /*$.ajax({
            url: "/image-crop",
            type: "POST",
            data: {"image":resp},
            success: function (data) {
                html = '<img src="' + resp + '" />';
                $("#upload-demo-i").html(html);
            }
        });*/
    });
});
 function b64toBlob(b64Data, contentType, sliceSize) {
    contentType = contentType || '';
    sliceSize = sliceSize || 512;

    var byteCharacters = atob(b64Data);
    var byteArrays = [];
    for (var offset = 0; offset < byteCharacters.length; offset += sliceSize) {
        var slice = byteCharacters.slice(offset, offset + sliceSize);

        var byteNumbers = new Array(slice.length);
        for (var i = 0; i < slice.length; i++) {
            byteNumbers[i] = slice.charCodeAt(i);
        }

        var byteArray = new Uint8Array(byteNumbers);

        byteArrays.push(byteArray);
    }

  var blob = new Blob(byteArrays, {type: contentType});
  return blob;
}
function appendFileAndSubmit(resp){
        // Get the form
        var form = document.getElementById("myAwesomeForm");
        var ImageURL = resp;
        // Split the base64 string in data and contentType
        var block = ImageURL.split(";");
        // Get the content type
        var contentType = block[0].split(":")[1];// In this case "image/gif"
        // get the real base64 content of the file
        var realData = block[1].split(",")[1];// In this case "iVBORw0KGg...."

        // Convert to blob
        var blob = b64toBlob(realData, contentType);
        // Create a FormData and append the file
        console.log(blob);
        var fd = new FormData(form);
        fd.append("photo", blob,"sreeni");
        //console.log(fd);
        //console.log($(this).serialize());
        // Submit Form and upload file
    }
</script>

@stop
@section('script')

<script src="{{asset('assets/coach/js/jquery-ui.js')}}"></script>
<script type="text/javascript">
    $( "#dob" ).datepicker({
            dateFormat: 'dd-mm-yy',
            changeMonth: true,
            changeYear: true,
            yearRange: "-100:+0"
        });
</script>
@stop