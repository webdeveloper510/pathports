@extends('admin.layouts.app')

@section('title','Alumini List || PathPorts')

@section('content')

    <!-- BEGIN: Content-->

        <div class="content-wrapper container-xxl p-0">
            
            @if ($message = Session::get('success'))

                <div class="alert alert-success">

                    <p>{{ $message }}</p>

                </div>

            @endif
            <div class="content-body">
                <div class="row">
                    <div class="col-12">


                        <!-- profile -->
                        <div class="card">
                            <div class="card-header border-bottom">
                                <h4 class="card-title">Profile Details</h4>
                            </div>
                            <div class="card-body py-2 my-25">
                                <!-- header section -->
                                <div class="d-flex">
                                    <a href="#" class="me-25 profile-img">
                                        
                                            @if ( auth()->user()->image)
                                                @if ( auth()->user()->role_id == 1 || auth()->user()->role_id == 2)
                                                    <img src="{{ asset('/')}}assets/admin/images/profile/{{Auth::user()->image}}" id="account-upload-img" class="uploadedAvatar rounded me-50" alt="profile image" style="height: 100px; width: 100px;" />
                                                @endif
                                                @if ( auth()->user()->role_id == 3)
                                                    <img src="{{ asset('/')}}assets/admin/images/student_profile/{{Auth::user()->image}}" id="account-upload-img" class="uploadedAvatar rounded me-50" alt="profile image" style="height: 100px; width: 100px;" />
                                                @endif
                                                @if ( auth()->user()->role_id == 4)
                                                    <img src="{{ asset('/')}}assets/admin/images/alumini/profile/{{Auth::user()->image}}" id="account-upload-img" class="uploadedAvatar rounded me-50" alt="profile image" style="height: 100px; width: 100px;" />
                                                @endif
                                            
                                            @else
                                            <img src="{{ asset('/')}}assets/admin/images/profile/default-image.jpg" id="account-upload-img" class="uploadedAvatar rounded me-50" alt="profile image" style="height: 100px; width: 100px;" />
                                            @endif
                                       
                                    </a>
                                    <form class="validate-form mt-2 pt-50" action="{{ route('update_profile', [Auth::user()->id]) }}" method="post" enctype="multipart/form-data">
                                    @csrf

                                    {{ method_field('PUT') }}
                                    <!-- upload and reset button -->
                                    <div class="d-flex align-items-end mt-75 ms-1">
                                        <div>
                                            

                                            <label for="account-upload" class="btn btn-sm btn-primary mb-75 me-75">Upload</label>
                                            <!-- <input type="file" id="account-upload" hidden accept="image/*" /> -->


                                            <input type="file" name="image" id="account-upload"  hidden accept="image/*" onchange="document.getElementById('account-upload-img').src = window.URL.createObjectURL(this.files[0])"/>
                                            <!-- <button type="button" id="account-reset" class="btn btn-sm btn-outline-secondary mb-75">Reset</button> -->
                                            <p class="mb-0">Allowed file types: png, jpg, jpeg.</p>
                                        </div>
                                    </div>
                                    <!--/ upload and reset button -->
                                </div>
                                <!--/ header section -->

                                <!-- form -->
                                
                                    <div class="row">
                                        <div class="col-12 col-sm-6 sole-share-details mb-1">
                                            <label class="form-label" for="accountFirstName">First Name</label>
                                            <input type="text" class="form-control" id="accountFirstName" name="firstName"  value="{{Auth::user()->firstName}}" data-msg="Please enter first name" />
                                        </div>
                                        <div class="col-12 col-sm-6 sole-share-details mb-1">
                                            <label class="form-label" for="accountLastName">Last Name</label>
                                            <input type="text" class="form-control" id="accountLastName" name="lastName" placeholder="Doe" value="{{Auth::user()->lastName}}" data-msg="Please enter last name" />
                                        </div>
                                        <div class="col-12 col-sm-6 sole-share-details mb-1">
                                            <label class="form-label" for="accountLastName">Username</label>
                                            <input type="text" class="form-control" id="accountLastName" name="userName" placeholder="Doe" value="{{Auth::user()->username}}" data-msg="Please enter last name" />
                                        </div>
                                        <div class="col-12 col-sm-6 sole-share-details mb-1">
                                            <label class="form-label" for="accountEmail">Email</label>
                                            <input type="email" class="form-control" id="accountEmail" name="email" placeholder="Email" value="{{Auth::user()->email}}" />
                                        </div>

                                        <div class="col-12 col-sm-6 sole-share-details mb-1">
                                            <label class="form-label" for="accountPhoneNumber">Phone Number</label>
                                            <input type="text" class="form-control phone-number-mask @error('contact') is-invalid @enderror" id="contact" name="contact" placeholder="Phone Number" value="{{Auth::user()->contact}}" />
                                            @error('contact')<div class="invalid-feedback"> {{ $message }} </div>@enderror
                                        </div>
                                        @if(auth()->user()->role_id == 3)
                                        <div class="col-12 col-sm-6 sole-share-details mb-1">
                                            <label class="form-label" for="accountPhoneNumber">Age</label>
                                            <input type="number" class="form-control @error('age') is-invalid @enderror" id="age" name="age" placeholder="Age" value="{{Auth::user()->age}}" />
                                            @error('Age')<div class="invalid-feedback"> {{ $message }} </div>@enderror
                                        </div>

                                      
                                        <div class="col-12 col-md-6 sole-share-details">



                                    <label class="form-label" for="basicSelect">College</label>



                                    <select class="form-select" id="basicSelect" name="college" value="{{Auth::user()->college}}" >


                                        <option value="">Please select your college</option>
                                        <option value="0" {{Auth::user()->college == 0 ? 'selected' : ''}}>The King's University College</option>

                                        <option value="1" {{Auth::user()->college == 1 ? 'selected' : ''}}>ABM College of Health and Technology</option>

                                        <option value="2" {{Auth::user()->college == 2 ? 'selected' : ''}}>Keyano College</option>

                                        <option value="3" {{Auth::user()->college == 3 ? 'selected' : ''}}>Keyano College</option>

                                       


                                    </select>



                                    </div>
                                    <div class="col-12 col-md-6 sole-share-details">



                                    <label class="form-label" for="basicSelect">Major</label>



                                    <select class="form-select" id="basicSelect" name="major" value="{{Auth::user()->major}}" >


                                        <option value="">Please select your major</option>
                                        <option value="0" {{Auth::user()->major == 0 ? 'selected' : ''}}>The King's University College</option>

                                        <option value="1" {{Auth::user()->major == 1 ? 'selected' : ''}}>ABM College of Health and Technology</option>

                                        <option value="2" {{Auth::user()->major == 2 ? 'selected' : ''}}>Keyano College</option>

                                        <option value="3" {{Auth::user()->major == 3 ? 'selected' : ''}}>Keyano College</option>

                                    


                                    </select>



                                    </div>

                                   
                                    <div class="col-12 col-md-6 sole-share-details">



                                    <label class="form-label" for="basicSelect">Industry</label>



                                    <select class="form-select" id="basicSelect" name="industry" value="{{Auth::user()->industry}}" >


                                        <option value="">Please select your industry</option>
                                        <option value="0" {{Auth::user()->industry == 0 ? 'selected' : ''}}>0</option>

                                        <option value="1" {{Auth::user()->industry == 1 ? 'selected' : ''}}>1</option>

                                        <option value="2" {{Auth::user()->industry == 2 ? 'selected' : ''}}>2</option>

                                    




                                    </select>



                                    </div>

                                    <div class="col-12 col-md-6 sole-share-details">



                                    <label class="form-label" for="basicSelect">Position</label>



                                    <select class="form-select" id="basicSelect" name="position" value="{{Auth::user()->position}}" >


                                        <option value="">Please select your position</option>
                                        <option value="0" {{Auth::user()->position == 0 ? 'selected' : ''}}>0</option>

                                        <option value="1" {{Auth::user()->position == 1 ? 'selected' : ''}}>1</option>

                                        <option value="2" {{Auth::user()->position == 2 ? 'selected' : ''}}>2</option>

                                    




                                    </select>



                                    </div>

                                    @endif

                                        <div class="col-12 col-md-6 sole-share-details">



                                             <div class="demo-inline-spacing">



                                                <label class="form-label" for="basicSelect">Gender</label>



                                                <div class="form-check form-check-inline">



                                                    <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="0" {{Auth::user()->gender=="0"? 'checked':'' }} />



                                                    <label class="form-check-label" for="inlineRadio1">Male</label>



                                                </div>



                        <div class="form-check form-check-inline">



                            <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="1"  {{Auth::user()->gender=="1"? 'checked':'' }}/>



                            <label class="form-check-label" for="inlineRadio2">Female</label>



                        </div>


                    </div>



                </div>
                @if(auth()->user()->role_id == 3)
                                        <div class="col-12 col-md-6 sole-share-details">



                        <div class="demo-inline-spacing">



                        <label class="form-label" for="basicSelect">Green Card</label>



                        <div class="form-check form-check-inline">



                            <input class="form-check-input" type="radio" name="green_card" id="inlineRadio1" value="0" {{Auth::user()->green_card=="0"? 'checked':'' }} />



                            <label class="form-check-label" for="inlineRadio1">No</label>



                        </div>



                        <div class="form-check form-check-inline">



                        <input class="form-check-input" type="radio" name="green_card" id="inlineRadio2" value="1"  {{Auth::user()->green_card=="1"? 'checked':'' }}/>



                        <label class="form-check-label" for="inlineRadio2">Yes</label>



                        </div>



                        </div>



                        </div>
@endif


                @if(auth()->user()->role_id == 3 || auth()->user()->role_id == 4)

                 <div class="col-12 col-md-6 sole-share-details">



                    <label class="form-label" for="basicSelect">Race</label>



                    <select class="form-select" id="basicSelect" name="race" value="{{Auth::user()->race}}" >


                        <option value="">Please select your race</option>
                        <option value="0" {{Auth::user()->race == 0 ? 'selected' : ''}}>Caucasian/White</option>

                        <option value="1" {{Auth::user()->race == 1 ? 'selected' : ''}}>Asian</option>

                        <option value="2" {{Auth::user()->race == 2 ? 'selected' : ''}}>Indian</option>

                        <option value="3" {{Auth::user()->race == 3 ? 'selected' : ''}}>American Indian</option>

                        <option value="4" {{Auth::user()->race == 4 ? 'selected' : ''}}>African American/Black</option>

                        <option value="5" {{Auth::user()->race == 5 ? 'selected' : ''}}>Latino/Hispanic</option>

                        <option value="6" {{Auth::user()->race == 6 ? 'selected' : ''}}>Middle Eastern/Arabic</option>



                    </select>



                </div>

                <div class="col-12 col-md-6 sole-share-details">

                    <label class="form-label" for="basicSelect">LGBQ</label>



                    <select class="form-select yes-no" id="basicSelect" name="lgbq" value="{{Auth::user()->lgbq}}">
                         <option value=''>Please select your Lgbq </option>
                        <option value="0" {{Auth::user()->lgbq == 0 ? 'selected' : ''}}>Yes</option>

                        <option value="1" {{Auth::user()->lgbq == 1 ? 'selected' : ''}}>No</option>

                    </select>

                </div>

                <div class="col-12 col-md-6 sole-share-details">

                    <label class="form-label" for="basicSelect">Veteran</label>



                    <select class="form-select" id="basicSelect" name="veteran" value="{{Auth::user()->veteran}}">
                     <option value=''>Please select your veteran </option>
                        <option value="0" {{Auth::user()->veteran == 0 ? 'selected' : ''}}>N/A</option>

                        <option value="1" {{Auth::user()->veteran == 1 ? 'selected' : ''}}>Army</option>

                        <option value="2" {{Auth::user()->veteran == 2 ? 'selected' : ''}}>Navy</option>

                        <option value="3" {{Auth::user()->veteran == 3 ? 'selected' : ''}}>Marines</option>

                        <option value="4" {{Auth::user()->veteran == 4 ? 'selected' : ''}}>Air Force</option>

                        <option value="5" {{Auth::user()->veteran == 5 ? 'selected' : ''}}>Coast Guard</option>

                    </select>

                </div>

               <div class="col-12 col-md-6 sole-share-details">

                    <label class="form-label" for="basicSelect">Level of Education</label>



                    <select class="form-select" id="basicSelect" name="education_level" value="{{Auth::user()->education_level}}">
                     <option value=''>Please select your education level </option>

                        <option value="0" {{Auth::user()->education_level == 0 ? 'selected' : ''}}>High School</option>

                        <option value="1" {{Auth::user()->education_level == 1 ? 'selected' : ''}}>BS/BA</option>

                        <option value="2" {{Auth::user()->education_level == 2 ? 'selected' : ''}}>Masters</option>

                        <option value="3" {{Auth::user()->education_level == 3 ? 'selected' : ''}}>Doctoral</option>

                    </select>

                </div>

                <div class="col-12 col-md-6 sole-share-details">

                    <label class="form-label" for="basicSelect">Born/Raised-Global</label>

                    <select class="form-select" id="basicSelect" name="born_raised_global" value="{{Auth::user()->born_raised_global}}"> 

                     
                    <option value=''>Please select your born/rasied-global</option>
                        <option value="Afghanistan" {{ Auth::user()->born_raised_global == "Afghanistan" ? 'selected' : '' }}>Afghanistan</option>

                        <option value="Albania" {{ Auth::user()->born_raised_global == "Albania" ? 'selected' : '' }}>Albania</option>

                        <option value="Algeria"{{ Auth::user()->born_raised_global == "Algeria" ? 'selected' : '' }}>Algeria</option>

                        <option value="American Samoa" {{ Auth::user()->born_raised_global == "American Samoa" ? 'selected' : '' }}>American Samoa</option>

                        <option value="Andorra" {{ Auth::user()->born_raised_global == "Andorra" ? 'selected' : '' }}>Andorra</option>

                        <option value="Angola" {{ Auth::user()->born_raised_global == "Angola" ? 'selected' : '' }}>Angola</option>

                        <option value="Anguilla" {{ Auth::user()->born_raised_global == "Anguilla" ? 'selected' : '' }}>Anguilla</option>

                        <option value="Antartica" {{ Auth::user()->born_raised_global == "Antartica" ? 'selected' : '' }}>Antarctica</option>

                        <option value="Antigua and Barbuda" {{Auth::user()->born_raised_global == "Antigua and Barbuda" ? 'selected' : '' }}>Antigua and Barbuda</option>

                        <option value="Argentina" {{ Auth::user()->born_raised_global == "Argentina" ? 'selected' : '' }}>Argentina</option>

                        <option value="Armenia" {{ Auth::user()->born_raised_global == "Armenia" ? 'selected' : '' }}>Armenia</option>

                        <option value="Aruba" {{ Auth::user()->born_raised_global == "Aruba" ? 'selected' : '' }}>Aruba</option>

                        <option value="Australia" {{ Auth::user()->born_raised_global == "Australia" ? 'selected' : '' }}>Australia</option>

                        <option value="Austria" {{ Auth::user()->born_raised_global == "Austria" ? 'selected' : '' }}>Austria</option>

                        <option value="Azerbaijan" {{ Auth::user()->born_raised_global == "Azerbaijan" ? 'selected' : '' }}>Azerbaijan</option>

                        <option value="Bahamas" {{ Auth::user()->born_raised_global == "Bahamas" ? 'selected' : '' }}>Bahamas</option>

                        <option value="Bahrain" {{ Auth::user()->born_raised_global == "Bahrain" ? 'selected' : '' }}>Bahrain</option>

                        <option value="Bangladesh" {{ Auth::user()->born_raised_global == "Bangladesh" ? 'selected' : '' }}>Bangladesh</option>

                        <option value="Barbados" {{Auth::user()->born_raised_global == "Barbados" ? 'selected' : '' }}>Barbados</option>

                        <option value="Belarus" {{ Auth::user()->born_raised_global == "Belarus" ? 'selected' : '' }}>Belarus</option>

                        <option value="Belgium" {{ Auth::user()->born_raised_global == "Belgium" ? 'selected' : '' }}>Belgium</option>

                        <option value="Belize" {{ Auth::user()->born_raised_global == "Belize" ? 'selected' : '' }}>Belize</option>

                        <option value="Benin" {{ Auth::user()->born_raised_global == "Benin" ? 'selected' : '' }} >Benin</option>

                        <option value="Bermuda" {{ Auth::user()->born_raised_global == "Bermuda" ? 'selected' : '' }}>Bermuda</option>

                        <option value="Bhutan" {{ Auth::user()->born_raised_global == "Bhutan" ? 'selected' : '' }}>Bhutan</option>

                        <option value="Bolivia" {{ Auth::user()->born_raised_global == "Bolivia" ? 'selected' : '' }}>Bolivia</option>

                        <option value="Bosnia and Herzegowina" {{ Auth::user()->born_raised_global == "Bosnia and Herzegowina" ? 'selected' : '' }}>Bosnia and Herzegowina</option>

                        <option value="Botswana" {{ Auth::user()->born_raised_global == "Botswana" ? 'selected' : '' }}>Botswana</option>

                        <option value="Bouvet Island" {{ Auth::user()->born_raised_global == "Bouvet Island" ? 'selected' : '' }}>Bouvet Island</option>

                        <option value="Brazil" {{ Auth::user()->born_raised_global == "Brazil" ? 'selected' : '' }}>Brazil</option>

                        <option value="British Indian Ocean Territory" {{ Auth::user()->born_raised_global == "British Indian Ocean Territory" ? 'selected' : '' }}>British Indian Ocean Territory</option>

                        <option value="Brunei Darussalam" {{ Auth::user()->born_raised_global == "Brunei Darussalam" ? 'selected' : '' }}>Brunei Darussalam</option>

                        <option value="Bulgaria" {{ Auth::user()->born_raised_global == "Bulgaria" ? 'selected' : '' }}>Bulgaria</option>

                        <option value="Burkina Faso" {{ Auth::user()->born_raised_global == "Burkina Faso" ? 'selected' : '' }}>Burkina Faso</option>

                        <option value="Burundi" {{ Auth::user()->born_raised_global == "Burundi" ? 'selected' : '' }}>Burundi</option>

                        <option value="Cambodia" {{ Auth::user()->born_raised_global == "Cambodia" ? 'selected' : '' }}>Cambodia</option>

                        <option value="Cameroon" {{ Auth::user()->born_raised_global == "Cameroon" ? 'selected' : '' }}>Cameroon</option>

                        <option value="Canada" {{ Auth::user()->born_raised_global == "Canada" ? 'selected' : '' }}>Canada</option>

                        <option value="Cape Verde" {{ Auth::user()->born_raised_global == "Cape Verde" ? 'selected' : '' }}>Cape Verde</option>

                        <option value="Cayman Islands" {{ Auth::user()->born_raised_global == "Cayman Islands" ? 'selected' : '' }}>Cayman Islands</option>

                        <option value="Central African Republic" {{ Auth::user()->born_raised_global == "Central African Republic" ? 'selected' : '' }}>Central African Republic</option>

                        <option value="Chad" {{ Auth::user()->born_raised_global == "Chad" ? 'selected' : '' }}>Chad</option>

                        <option value="Chile" {{ Auth::user()->born_raised_global == "Chile" ? 'selected' : '' }}>Chile</option>

                        <option value="China" {{ Auth::user()->born_raised_global == "China" ? 'selected' : '' }}>China</option>

                        <option value="Christmas Island" {{ Auth::user()->born_raised_global == "Christmas Island" ? 'selected' : '' }}>Christmas Island</option>

                        <option value="Cocos Islands" {{ Auth::user()->born_raised_global == "Cocos Islands" ? 'selected' : '' }}>Cocos (Keeling) Islands</option>

                        <option value="Colombia" {{ Auth::user()->born_raised_global == "Colombia" ? 'selected' : '' }}>Colombia</option>

                        <option value="Comoros" {{ Auth::user()->born_raised_global == "Comoros" ? 'selected' : '' }}>Comoros</option>

                        <option value="Congo" {{ Auth::user()->born_raised_global == "Congo" ? 'selected' : '' }}>Congo</option>

                        <option value="Congo" {{ Auth::user()->born_raised_global == "Congo" ? 'selected' : '' }}>Congo, the Democratic Republic of the</option>

                        <option value="Cook Islands" {{ Auth::user()->born_raised_global == "Cook Islands" ? 'selected' : '' }}>Cook Islands</option>

                        <option value="Costa Rica" {{ Auth::user()->born_raised_global == "Costa Rica" ? 'selected' : '' }}>Costa Rica</option>

                        <option value="Cota D'Ivoire" {{ Auth::user()->born_raised_global == "Cota D'Ivoire" ? 'selected' : '' }}>Cote d'Ivoire</option>

                        <option value="Croatia" {{ Auth::user()->born_raised_global == "Croatia" ? 'selected' : '' }}>Croatia (Hrvatska)</option>

                        <option value="Cuba" {{ Auth::user()->born_raised_global == "Cuba" ? 'selected' : '' }}>Cuba</option>

                        <option value="Cyprus" {{ Auth::user()->born_raised_global == "Cyprus" ? 'selected' : '' }}>Cyprus</option>

                        <option value="Czech Republic" {{ Auth::user()->born_raised_global == "Czech Republic" ? 'selected' : '' }}>Czech Republic</option>

                        <option value="Denmark" {{ Auth::user()->born_raised_global == "Denmark" ? 'selected' : '' }}>Denmark</option>

                        <option value="Djibouti" {{ Auth::user()->born_raised_global == "Djibouti" ? 'selected' : '' }}>Djibouti</option>

                        <option value="Dominica" {{ Auth::user()->born_raised_global == "Dominica" ? 'selected' : '' }}>Dominica</option>

                        <option value="Dominican Republic" {{ Auth::user()->born_raised_global == "Dominican Republic" ? 'selected' : '' }}>Dominican Republic</option>

                        <option value="East Timor" {{ Auth::user()->born_raised_global == "East Timor" ? 'selected' : '' }}>East Timor</option>

                        <option value="Ecuador" {{ Auth::user()->born_raised_global == "Ecuador" ? 'selected' : '' }}>Ecuador</option>

                        <option value="Egypt" {{ Auth::user()->born_raised_global == "Egypt" ? 'selected' : '' }}>Egypt</option>

                        <option value="El Salvador" {{ Auth::user()->born_raised_global == "El Salvador" ? 'selected' : '' }}>El Salvador</option>

                        <option value="Equatorial Guinea" {{Auth::user()->born_raised_global == "Equatorial Guinea" ? 'selected' : '' }}>Equatorial Guinea</option>

                        <option value="Eritrea" {{ Auth::user()->born_raised_global == "Eritrea" ? 'selected' : '' }}>Eritrea</option>

                        <option value="Estonia" {{ Auth::user()->born_raised_global == "Estonia" ? 'selected' : '' }}>Estonia</option>

                        <option value="Ethiopia" {{ Auth::user()->born_raised_global == "Ethiopia" ? 'selected' : '' }}>Ethiopia</option>

                        <option value="Falkland Islands" {{ Auth::user()->born_raised_global == "Falkland Islands" ? 'selected' : '' }}>Falkland Islands (Malvinas)</option>

                        <option value="Faroe Islands" {{ Auth::user()->born_raised_global == "Faroe Islands" ? 'selected' : '' }}>Faroe Islands</option>

                        <option value="Fiji" {{ Auth::user()->born_raised_global == "Fiji" ? 'selected' : '' }}>Fiji</option>

                        <option value="Finland" {{ Auth::user()->born_raised_global == "Finland" ? 'selected' : '' }}>Finland</option>

                        <option value="France" {{ Auth::user()->born_raised_global == "France" ? 'selected' : '' }}>France</option>

                        <option value="France Metropolitan" {{ Auth::user()->born_raised_global == "France Metropolitan" ? 'selected' : '' }}>France, Metropolitan</option>

                        <option value="French Guiana" {{Auth::user()->born_raised_global== "French Guiana" ? 'selected' : '' }}>French Guiana</option>

                        <option value="French Polynesia" {{ Auth::user()->born_raised_global == "French Polynesia" ? 'selected' : '' }}>French Polynesia</option>

                        <option value="French Southern Territories" {{ Auth::user()->born_raised_global == "French Southern Territories" ? 'selected' : '' }}>French Southern Territories</option>

                        <option value="Gabon" {{ Auth::user()->born_raised_global== "Gabon" ? 'selected' : '' }}>Gabon</option>

                        <option value="Gambia" {{ Auth::user()->born_raised_global== "Gambia" ? 'selected' : '' }}>Gambia</option>

                        <option value="Georgia" {{ Auth::user()->born_raised_global == "Georgia" ? 'selected' : '' }}>Georgia</option>

                        <option value="Germany" {{ Auth::user()->born_raised_global == "Germany" ? 'selected' : '' }}> Germany</option>

                        <option value="Ghana" {{Auth::user()->born_raised_global == "Ghana" ? 'selected' : '' }}>Ghana</option>

                        <option value="Gibraltar" {{ Auth::user()->born_raised_global == "Gibraltar" ? 'selected' : '' }}>Gibraltar</option>

                        <option value="Greece" {{ Auth::user()->born_raised_global == "Greece" ? 'selected' : '' }}>Greece</option>

                        <option value="Greenland" {{ Auth::user()->born_raised_global == "Greenland" ? 'selected' : '' }}>Greenland</option>

                        <option value="Grenada" {{ Auth::user()->born_raised_global == "Grenada" ? 'selected' : '' }}>Grenada</option>

                        <option value="Guadeloupe" {{ Auth::user()->born_raised_global == "Guadeloupe" ? 'selected' : '' }}>Guadeloupe</option>

                        <option value="Guam" {{ Auth::user()->born_raised_global == "Guam" ? 'selected' : '' }}>Guam</option>

                        <option value="Guatemala" {{ Auth::user()->born_raised_global == "Guatemala" ? 'selected' : '' }}>Guatemala</option>

                        <option value="Guinea" {{ Auth::user()->born_raised_global == "Guinea" ? 'selected' : '' }}>Guinea</option>

                        <option value="Guinea-Bissau" {{ Auth::user()->born_raised_global == "Guinea-Bissau" ? 'selected' : '' }}>Guinea-Bissau</option>

                        <option value="Guyana" {{ Auth::user()->born_raised_global == "Guyana" ? 'selected' : '' }}>Guyana</option>

                        <option value="Haiti" {{ Auth::user()->born_raised_global == "Haiti" ? 'selected' : '' }}>Haiti</option>

                        <option value="Heard and McDonald Islands" {{ Auth::user()->born_raised_global == "Heard and McDonald Islands" ? 'selected' : '' }}>Heard and Mc Donald Islands</option>

                        <option value="" {{ Auth::user()->born_raised_global == "Holy See" ? 'selected' : '' }}>Holy See (Vatican City State)</option>

                        <option value="Honduras" {{ Auth::user()->born_raised_global == "Algeria" ? 'selected' : '' }}>Honduras</option>

                        <option value="Hong Kong" {{ Auth::user()->born_raised_global == "Hong Kong" ? 'selected' : '' }}>Hong Kong</option>

                        <option value="Hungary" {{ Auth::user()->born_raised_global == "Hungary" ? 'selected' : '' }}>Hungary</option>

                        <option value="Iceland" {{ Auth::user()->born_raised_global == "Iceland" ? 'selected' : '' }}>Iceland</option>

                        <option value="India" {{ Auth::user()->born_raised_global == "India" ? 'selected' : '' }}>India</option>

                        <option value="Indonesia" {{ Auth::user()->born_raised_global == "Indonesia" ? 'selected' : '' }}>Indonesia</option>

                        <option value="Iran" {{ Auth::user()->born_raised_global == "Iran" ? 'selected' : '' }}>Iran (Islamic Republic of)</option>

                        <option value="Iraq" {{ Auth::user()->born_raised_global == "Iraq" ? 'selected' : '' }}>Iraq</option>

                        <option value="Ireland" {{ Auth::user()->born_raised_global == "Ireland" ? 'selected' : '' }}>Ireland</option>

                        <option value="Israel" {{ Auth::user()->born_raised_global == "Israel" ? 'selected' : '' }}>Israel</option>

                        <option value="Italy" {{ Auth::user()->born_raised_global == "Italy" ? 'selected' : '' }}>Italy</option>

                        <option value="Jamaica" {{ Auth::user()->born_raised_global == "Jamaica" ? 'selected' : '' }}>Jamaica</option>

                        <option value="Japan" {{ Auth::user()->born_raised_global == "Algeria" ? 'selected' : '' }}>Japan</option>

                        <option value="Jordan" {{ Auth::user()->born_raised_global == "Jordan" ? 'selected' : '' }}>Jordan</option>

                        <option value="Kazakhstan" {{ Auth::user()->born_raised_global == "Kazakhstan" ? 'selected' : '' }}>Kazakhstan</option>

                        <option value="Kenya" {{ Auth::user()->born_raised_global == "Kenya" ? 'selected' : '' }}>Kenya</option>

                        <option value="Kiribati" {{ Auth::user()->born_raised_global == "Kiribati" ? 'selected' : '' }}>Kiribati</option>

                        <option value="Democratic People's Republic of Korea" {{Auth::user()->born_raised_global == "Democratic People's Republic of Korea" ? 'selected' : '' }}>Korea, Democratic People's Republic of</option>

                        <option value="Korea" {{ Auth::user()->born_raised_global == "Korea" ? 'selected' : '' }}>Korea, Republic of</option>

                        <option value="Kuwait" {{ Auth::user()->born_raised_global == "Kuwait" ? 'selected' : '' }}>Kuwait</option>

                        <option value="Kyrgyzstan" {{ Auth::user()->born_raised_global == "Kyrgyzstan" ? 'selected' : '' }}>Kyrgyzstan</option>

                        <option value="Lao" {{ Auth::user()->born_raised_global == "Lao" ? 'selected' : '' }}>Lao People's Democratic Republic</option>

                        <option value="Latvia" {{ Auth::user()->born_raised_global == "Latvia" ? 'selected' : '' }}>Latvia</option>

                        <option value="Lebanon" {{ Auth::user()->born_raised_global == "Lebanon" ? 'selected' : '' }}>Lebanon</option>

                        <option value="Lesotho" {{ Auth::user()->born_raised_global == "Lesotho" ? 'selected' : '' }}>Lesotho</option>

                        <option value="Liberia" {{ Auth::user()->born_raised_global == "Liberia" ? 'selected' : '' }}>Liberia</option>

                        <option value="Libyan Arab Jamahiriya" {{ Auth::user()->born_raised_global == "Libyan Arab Jamahiriya" ? 'selected' : '' }}>Libyan Arab Jamahiriya</option>

                        <option value="Liechtenstein" {{ Auth::user()->born_raised_global == "Liechtenstein" ? 'selected' : '' }}>Liechtenstein</option>

                        <option value="Lithuania" {{Auth::user()->born_raised_global == "Lithuania" ? 'selected' : '' }}>Lithuania</option>

                        <option value="Luxembourg" {{ Auth::user()->born_raised_global == "Luxembourg" ? 'selected' : '' }}>Luxembourg</option>

                        <option value="Macau" {{ Auth::user()->born_raised_global == "Macau" ? 'selected' : '' }}>Macau</option>

                        <option value="Macedonia" {{ Auth::user()->born_raised_global == "Macedonia" ? 'selected' : '' }}>Macedonia, The Former Yugoslav Republic of</option>

                        <option value="Madagascar" {{ Auth::user()->born_raised_global == "Madagascar" ? 'selected' : '' }}>Madagascar</option>

                        <option value="Malawi" {{Auth::user()->born_raised_global == "Malawi" ? 'selected' : '' }}>Malawi</option>

                        <option value="Malaysia" {{ Auth::user()->born_raised_global == "Malaysia" ? 'selected' : '' }}>Malaysia</option>

                        <option value="Maldives" {{ Auth::user()->born_raised_global == "Maldives" ? 'selected' : '' }}>Maldives</option>

                        <option value="Mali" {{ Auth::user()->born_raised_global == "Mali" ? 'selected' : '' }}>Mali</option>

                        <option value="Malta" {{ Auth::user()->born_raised_global == "Malta" ? 'selected' : '' }}>Malta</option>

                        <option value="Marshall Islands" {{ Auth::user()->born_raised_global == "Marshall Islands" ? 'selected' : '' }}>Marshall Islands</option>

                        <option value="Martinique" {{ Auth::user()->born_raised_global == "Martinique" ? 'selected' : '' }}>Martinique</option>

                        <option value="Mauritania" {{ Auth::user()->born_raised_global == "Mauritania" ? 'selected' : '' }}>Mauritania</option>

                        <option value="Mauritius" {{ Auth::user()->born_raised_global == "Mauritius" ? 'selected' : '' }}>Mauritius</option>

                        <option value="Mayotte" {{ Auth::user()->born_raised_global == "Mayotte" ? 'selected' : '' }}>Mayotte</option>

                        <option value="Mexico" {{ Auth::user()->born_raised_global == "Mexico" ? 'selected' : '' }}>Mexico</option>

                        <option value="Micronesia" {{ Auth::user()->born_raised_global == "Micronesia" ? 'selected' : '' }}>Micronesia, Federated States of</option>

                        <option value="Moldova" {{ Auth::user()->born_raised_global == "Moldova" ? 'selected' : '' }}>Moldova, Republic of</option>

                        <option value="" {{ Auth::user()->born_raised_global == "Monaco" ? 'selected' : '' }}>Monaco</option>

                        <option value="Mongolia" {{ Auth::user()->born_raised_global == "Mongolia" ? 'selected' : '' }}>Mongolia</option>

                        <option value="Montserrat" {{ Auth::user()->born_raised_global == "Montserrat" ? 'selected' : '' }}>Montserrat</option>

                        <option value="Morocco" {{Auth::user()->born_raised_global == "Morocco" ? 'selected' : '' }}>Morocco</option>

                        <option value="Mozambique" {{ Auth::user()->born_raised_global == "Mozambique" ? 'selected' : '' }}>Mozambique</option>

                        <option value="Myanmar" {{Auth::user()->born_raised_global == "Myanmar" ? 'selected' : '' }}>Myanmar</option>

                        <option value="Namibia" {{ Auth::user()->born_raised_global == "Namibia" ? 'selected' : '' }}>Namibia</option>

                        <option value="Nauru" {{ Auth::user()->born_raised_global == "Nauru" ? 'selected' : '' }}>Nauru</option>

                        <option value="Nepal" {{ Auth::user()->born_raised_global == "Nepal" ? 'selected' : '' }}>Nepal</option>

                        <option value="Netherlands" {{Auth::user()->born_raised_global == "Netherlands" ? 'selected' : '' }}>Netherlands</option>

                        <option value="Netherlands Antilles" {{ old('born_raised_global') == "Netherlands Antilles" ? 'selected' : '' }}>Netherlands Antilles</option>

                        <option value="New Caledonia" {{ Auth::user()->born_raised_global == "New Caledonia" ? 'selected' : '' }}>New Caledonia</option>

                        <option value="New Zealand" {{ Auth::user()->born_raised_global == "New Zealand" ? 'selected' : '' }}>New Zealand</option>

                        <option value="Nicaragua" {{ Auth::user()->born_raised_global == "Nicaragua" ? 'selected' : '' }}>Nicaragua</option>

                        <option value="Niger" {{ Auth::user()->born_raised_global == "Niger" ? 'selected' : '' }}>Niger</option>

                        <option value="Nigeria" {{ Auth::user()->born_raised_global == "Nigeria" ? 'selected' : '' }}>Nigeria</option>

                        <option value="Niue" {{ Auth::user()->born_raised_global == "Niue" ? 'selected' : '' }}>Niue</option>

                        <option value="Norfolk Island" {{Auth::user()->born_raised_global == "Norfolk Island" ? 'selected' : '' }}>Norfolk Island</option>

                        <option value="Northern Mariana Islands" {{ Auth::user()->born_raised_global == "Northern Mariana Islands" ? 'selected' : '' }}> Northern Mariana Islands</option>

                        <option value="Norway" {{ Auth::user()->born_raised_global == "Norway" ? 'selected' : '' }}>Norway</option>

                        <option value="Oman" {{ Auth::user()->born_raised_global == "Oman" ? 'selected' : '' }}> Oman</option>

                        <option value="Pakistan" {{ Auth::user()->born_raised_global == "Pakistan" ? 'selected' : '' }}>Pakistan</option>

                        <option value="Palau" {{ Auth::user()->born_raised_global == "Palau" ? 'selected' : '' }}>Palau</option>

                        <option value="Panama" {{ Auth::user()->born_raised_global == "Panama" ? 'selected' : '' }}>Panama</option>

                        <option value="Papua New Guinea" {{ Auth::user()->born_raised_global == "Papua New Guinea" ? 'selected' : '' }}>Papua New Guinea</option>

                        <option value="Paraguay" {{ Auth::user()->born_raised_global == "Paraguay" ? 'selected' : '' }}>Paraguay</option>

                        <option value="Peru" {{ Auth::user()->born_raised_global == "Algeria" ? 'selected' : '' }}>Peru</option>

                        <option value="Philippines" {{ Auth::user()->born_raised_global == "Algeria" ? 'selected' : '' }}>Philippines</option>

                        <option value="Pitcairn" {{ Auth::user()->born_raised_global == "Pitcairn" ? 'selected' : '' }}>Pitcairn</option>

                        <option value="Poland" {{ Auth::user()->born_raised_global == "Poland" ? 'selected' : '' }}>Poland</option>

                        <option value="Portugal" {{ Auth::user()->born_raised_global == "Portugal" ? 'selected' : '' }}>Portugal</option>

                        <option value="Puerto Rico" {{ Auth::user()->born_raised_global == "Puerto Rico" ? 'selected' : '' }}>Puerto Rico</option>

                        <option value="Qatar" {{ Auth::user()->born_raised_global == "Qatar" ? 'selected' : '' }}>Qatar</option>

                        <option value="Reunion" {{ Auth::user()->born_raised_global == "Reunion" ? 'selected' : '' }}>Reunion</option>

                        <option value="Romania" {{ Auth::user()->born_raised_global == "Romania" ? 'selected' : '' }}>Romania</option>

                        <option value="Russia" {{ Auth::user()->born_raised_global == "Russia" ? 'selected' : '' }} >Russian Federation</option>

                        <option value="Rwanda" {{ Auth::user()->born_raised_global == "Rwanda" ? 'selected' : '' }}>Rwanda</option>

                        <option value="Saint Kitts and Nevis" {{ Auth::user()->born_raised_global == "Saint Kitts and Nevis" ? 'selected' : '' }}>Saint Kitts and Nevis</option> 

                        <option value="Saint LUCIA" {{ Auth::user()->born_raised_global == "Saint LUCIA" ? 'selected' : '' }}>Saint LUCIA</option>

                        <option value="Saint Vincent" {{ Auth::user()->born_raised_global == "Saint Vincent" ? 'selected' : '' }}>Saint Vincent and the Grenadines</option>

                        <option value="Samoa" {{ Auth::user()->born_raised_global == "Samoa" ? 'selected' : '' }}>Samoa</option>

                        <option value="San Marino" {{ Auth::user()->born_raised_global == "San Marino" ? 'selected' : '' }}>San Marino</option>

                        <option value="Sao Tome and Principe" {{ Auth::user()->born_raised_global == "Sao Tome and Principe" ? 'selected' : '' }}>Sao Tome and Principe</option> 

                        <option value="Saudi Arabia" {{ Auth::user()->born_raised_global == "Saudi Arabia" ? 'selected' : '' }}>Saudi Arabia</option>

                        <option value="Senegal" {{ Auth::user()->born_raised_global == "Senegal" ? 'selected' : '' }}>Senegal</option>

                        <option value="Seychelles" {{ Auth::user()->born_raised_global == "Seychelles" ? 'selected' : '' }}>Seychelles</option>

                        <option value="Sierra" {{ Auth::user()->born_raised_global == "Sierra" ? 'selected' : '' }}>Sierra Leone</option>

                        <option value="Singapore" {{ Auth::user()->born_raised_global == "Singapore" ? 'selected' : '' }}>Singapore</option>

                        <option value="Slovakia" {{  Auth::user()->born_raised_global == "Slovakia" ? 'selected' : '' }} >Slovakia (Slovak Republic)</option>

                        <option value="Slovenia" {{ Auth::user()->born_raised_global == "Slovenia" ? 'selected' : '' }}>Slovenia</option>

                        <option value="Solomon Islands" {{ Auth::user()->born_raised_global == "Solomon Islands" ? 'selected' : '' }}>Solomon Islands</option>

                        <option value="Somalia" {{ Auth::user()->born_raised_global== "Somalia" ? 'selected' : '' }}>Somalia</option>

                        <option value="South Africa" {{ Auth::user()->born_raised_global == "South Africa" ? 'selected' : '' }}>South Africa</option>

                        <option value="South Georgia" {{ Auth::user()->born_raised_global == "South Georgia" ? 'selected' : '' }}>South Georgia and the South Sandwich Islands</option>

                        <option value="Span" {{ Auth::user()->born_raised_global == "Span" ? 'selected' : '' }}>Spain</option>

                        <option value="SriLanka" {{ Auth::user()->born_raised_global == "SriLanka" ? 'selected' : '' }}>Sri Lanka</option>

                        <option value="St. Helena" {{ Auth::user()->born_raised_global == "St. Helena" ? 'selected' : '' }}>St. Helena</option>

                        <option value="St. Pierre and Miguelon" {{ Auth::user()->born_raised_global == "St. Pierre and Miguelon" ? 'selected' : '' }}>St. Pierre and Miquelon</option>

                        <option value="Sudan" {{ Auth::user()->born_raised_global == "Sudan" ? 'selected' : '' }}>Sudan</option>

                        <option value="Suriname" {{ Auth::user()->born_raised_global == "Suriname" ? 'selected' : '' }}>Suriname</option>

                        <option value="Svalbard" {{ Auth::user()->born_raised_global == "Svalbard" ? 'selected' : '' }}>Svalbard and Jan Mayen Islands</option>

                        <option value="Swaziland" {{ Auth::user()->born_raised_global == "Swaziland" ? 'selected' : '' }}>Swaziland</option>

                        <option value="Sweden" {{ Auth::user()->born_raised_global == "Sweden" ? 'selected' : '' }}>Sweden</option>

                        <option value="Switzerland" {{ Auth::user()->born_raised_global == "Switzerland" ? 'selected' : '' }}>Switzerland</option>

                        <option value="Syria" {{ Auth::user()->born_raised_global == "Syria" ? 'selected' : '' }}>Syrian Arab Republic</option>

                        <option value="Taiwan" {{ Auth::user()->born_raised_global == "Taiwan" ? 'selected' : '' }}>Taiwan, Province of China</option>

                        <option value="Tajikistan" {{ Auth::user()->born_raised_global == "Tajikistan" ? 'selected' : '' }}>Tajikistan</option>

                        <option value="Tanzania" {{ Auth::user()->born_raised_global == "Tanzania" ? 'selected' : '' }}>Tanzania, United Republic of</option>

                        <option value="Thailand" {{ Auth::user()->born_raised_global == "Thailand" ? 'selected' : '' }}>Thailand</option>

                        <option value="Togo" {{ Auth::user()->born_raised_global == "Togo" ? 'selected' : '' }}>Togo</option>

                        <option value="Tokelau" {{ Auth::user()->born_raised_global == "Tokelau" ? 'selected' : '' }}>Tokelau</option>

                        <option value="Tonga" {{ Auth::user()->born_raised_global == "Tonga" ? 'selected' : '' }}>Tonga</option>

                        <option value="Trinidad and Tobago" {{ Auth::user()->born_raised_global == "Trinidad and Tobago" ? 'selected' : '' }}>Trinidad and Tobago</option>

                        <option value="Tunisia" {{ Auth::user()->born_raised_global == "Tunisia" ? 'selected' : '' }}>Tunisia</option>

                        <option value="Turkey" {{ Auth::user()->born_raised_global == "Turkey" ? 'selected' : '' }}>Turkey</option>

                        <option value="Turkmenistan" {{ Auth::user()->born_raised_global == "Turkmenistan" ? 'selected' : '' }}>Turkmenistan</option>

                        <option value="Turks and Caicos" {{ Auth::user()->born_raised_global == "Algeria" ? 'selected' : '' }}>Turks and Caicos Islands</option>

                        <option value="Tuvalu" {{ Auth::user()->born_raised_global == "Tuvalu" ? 'selected' : '' }}>Tuvalu</option>

                        <option value="Uganda" {{ Auth::user()->born_raised_global == "Uganda" ? 'selected' : '' }}>Uganda</option>

                        <option value="Ukraine" {{ Auth::user()->born_raised_global == "Ukraine" ? 'selected' : '' }}>Ukraine</option>

                        <option value="United Arab Emirates" {{ Auth::user()->born_raised_global == "United Arab Emirates" ? 'selected' : '' }}>United Arab Emirates</option>

                        <option value="United Kingdom" {{ Auth::user()->born_raised_global == "United Kingdom" ? 'selected' : '' }}>United Kingdom</option>

                        <option value="United States" {{ Auth::user()->born_raised_global == "United States" ? 'selected' : '' }}>United States</option>

                        <option value="United States Minor Outlying Islands" {{ Auth::user()->born_raised_global == "United States Minor Outlying Islands" ? 'selected' : '' }}>United States Minor Outlying Islands</option>

                        <option value="Uruguay" {{ Auth::user()->born_raised_global == "Uruguay" ? 'selected' : '' }}>Uruguay</option>

                        <option value="Uzbekistan" {{ Auth::user()->born_raised_global == "Uzbekistan" ? 'selected' : '' }}>Uzbekistan</option>

                        <option value="Vanuatu" {{ Auth::user()->born_raised_global == "Vanuatu" ? 'selected' : '' }} >Vanuatu</option>

                        <option value="Venezuela" {{ Auth::user()->born_raised_global == "Venezuela" ? 'selected' : '' }}>Venezuela</option>

                        <option value="Vietnam" {{ Auth::user()->born_raised_global == "Vietnam" ? 'selected' : '' }}>Viet Nam</option>

                        <option value="Virgin Islands (British)" {{ Auth::user()->born_raised_global == "Virgin Islands (British)" ? 'selected' : '' }}>Virgin Islands (British)</option>

                        <option value="Virgin Islands (U.S)" {{ Auth::user()->born_raised_global == "Virgin Islands (U.S)" ? 'selected' : '' }}>Virgin Islands (U.S.)</option>

                        <option value="Wallis and Futana Islands" {{ Auth::user()->born_raised_global == "Wallis and Futana Islands" ? 'selected' : '' }}>Wallis and Futuna Islands</option>

                        <option value="Western Sahara" {{ Auth::user()->born_raised_global == "Western Sahara" ? 'selected' : '' }}>Western Sahara</option>

                        <option value="Yemen" {{ Auth::user()->born_raised_global == "Yemen" ? 'selected' : '' }}>Yemen</option>

                        <option value="Serbia" {{ Auth::user()->born_raised_global == "Serbia" ? 'selected' : '' }}>Serbia</option>

                        <option value="Zambia" {{ Auth::user()->born_raised_global == "Zambia" ? 'selected' : '' }}>Zambia</option>

                        <option value="Zimbabwe" {{ Auth::user()->born_raised_global == "Zimbabwe" ? 'selected' : '' }}>Zimbabwe</option>

                        </select>

                </div>

                <div class="col-12 col-md-6 sole-share-details">

                    <label class="form-label" for="basicSelect">Born/Raised - US</label>

                    <select class="form-select" id="basicSelect" name="born_raised_us" value="{{Auth::user()->born_raised_us}}">
                        <option value="">Please select your location goal state</option>
                        <option value="AL" {{ Auth::user()->born_raised_us ==  "AL" ? 'selected' : '' }}>Alabama</option>

                        <option value="AK" {{ Auth::user()->born_raised_us ==  "AK" ? 'selected' : '' }}>Alaska</option>

                        <option value="AZ" {{ Auth::user()->born_raised_us ==  "AZ" ? 'selected' : '' }}>Arizona</option>

                        <option value="AR" {{Auth::user()->born_raised_us ==  "AR" ? 'selected' : '' }}>Arkansas</option>

                        <option value="CA" {{ Auth::user()->born_raised_us ==  "CA" ? 'selected' : '' }}>California</option>

                        <option value="CO" {{ Auth::user()->born_raised_us ==  "CO" ? 'selected' : '' }}>Colorado</option>

                        <option value="CT" {{ Auth::user()->born_raised_us ==  "CT" ? 'selected' : '' }}>Connecticut</option>

                        <option value="DE" {{ Auth::user()->born_raised_us ==  "DE" ? 'selected' : '' }}>Delaware</option>

                        <option value="DC" {{ Auth::user()->born_raised_us ==  "DC" ? 'selected' : '' }}>District Of Columbia</option>

                        <option value="FL" {{ Auth::user()->born_raised_us ==  "FL" ? 'selected' : '' }}>Florida</option>

                        <option value="GA" {{ Auth::user()->born_raised_us ==  "GA" ? 'selected' : '' }}>Georgia</option>

                        <option value="HI" {{ Auth::user()->born_raised_us ==  "HI" ? 'selected' : '' }}>Hawaii</option>

                        <option value="ID" {{ Auth::user()->born_raised_us ==  "ID" ? 'selected' : '' }}>Idaho</option>

                        <option value="IL" {{ Auth::user()->born_raised_us ==  "IL" ? 'selected' : '' }}>Illinois</option>

                        <option value="IN" {{ Auth::user()->born_raised_us ==  "IN" ? 'selected' : '' }}>Indiana</option>

                        <option value="IA" {{ Auth::user()->born_raised_us ==  "IA" ? 'selected' : '' }}>Iowa</option>

                        <option value="KS" {{ Auth::user()->born_raised_us ==  "KS" ? 'selected' : '' }}>Kansas</option>

                        <option value="KY" {{ Auth::user()->born_raised_us ==  "KY" ? 'selected' : '' }}>Kentucky</option>

                        <option value="LA" {{ Auth::user()->born_raised_us ==  "LA" ? 'selected' : '' }}>Louisiana</option>

                        <option value="ME" {{ Auth::user()->born_raised_us ==  "ME" ? 'selected' : '' }}>Maine</option>

                        <option value="MD" {{ Auth::user()->born_raised_us ==  "MD" ? 'selected' : '' }}>Maryland</option>

                        <option value="MA" {{ Auth::user()->born_raised_us ==  "MA" ? 'selected' : '' }}>Massachusetts</option>

                        <option value="MI" {{ Auth::user()->born_raised_us ==  "MI" ? 'selected' : '' }}>Michigan</option>

                        <option value="MN" {{ Auth::user()->born_raised_us ==  "MN" ? 'selected' : '' }}>Minnesota</option>

                        <option value="MS" {{ Auth::user()->born_raised_us ==  "MS" ? 'selected' : '' }}>Mississippi</option>

                        <option value="MO" {{ Auth::user()->born_raised_us ==  "MO" ? 'selected' : '' }}>Missouri</option>

                        <option value="MT" {{ Auth::user()->born_raised_us ==  "MT" ? 'selected' : '' }}>Montana</option>

                        <option value="NE" {{ Auth::user()->born_raised_us ==  "NE" ? 'selected' : '' }}>Nebraska</option>

                        <option value="NV" {{ Auth::user()->born_raised_us ==  "NV" ? 'selected' : '' }}>Nevada</option>

                        <option value="NH" {{ Auth::user()->born_raised_us ==  "NH" ? 'selected' : '' }}>New Hampshire</option>

                        <option value="NJ" {{ Auth::user()->born_raised_us ==  "AK" ? 'selected' : '' }}>New Jersey</option>

                        <option value="NM" {{ Auth::user()->born_raised_us ==  "AK" ? 'selected' : '' }}>New Mexico</option>

                        <option value="NY" {{ Auth::user()->born_raised_us ==  "AK" ? 'selected' : '' }}>New York</option>

                        <option value="NC" {{ Auth::user()->born_raised_us ==  "NC" ? 'selected' : '' }}>North Carolina</option>

                        <option value="ND" {{ Auth::user()->born_raised_us ==  "ND" ? 'selected' : '' }}>North Dakota</option>

                        <option value="OH" {{ Auth::user()->born_raised_us ==  "OH" ? 'selected' : '' }}>Ohio</option>

                        <option value="OK" {{ Auth::user()->born_raised_us ==  "AK" ? 'selected' : '' }}>Oklahoma</option>

                        <option value="OR" {{ Auth::user()->born_raised_us ==  "OR" ? 'selected' : '' }}>Oregon</option>

                        <option value="PA" {{ Auth::user()->born_raised_us ==  "PA" ? 'selected' : '' }}>Pennsylvania</option>

                        <option value="RI" {{ Auth::user()->born_raised_us ==  "RI" ? 'selected' : '' }}>Rhode Island</option>

                        <option value="SC" {{ Auth::user()->born_raised_us ==  "SC" ? 'selected' : '' }}>South Carolina</option>

                        <option value="SD" {{ Auth::user()->born_raised_us ==  "SD" ? 'selected' : '' }}>South Dakota</option>

                        <option value="TN" {{ Auth::user()->born_raised_us ==  "TN" ? 'selected' : '' }}>Tennessee</option>

                        <option value="TX" {{ Auth::user()->born_raised_us ==  "TX" ? 'selected' : '' }}>Texas</option>

                        <option value="UT" {{ Auth::user()->born_raised_us ==  "UT" ? 'selected' : '' }}>Utah</option>

                        <option value="VT" {{ Auth::user()->born_raised_us ==  "VT" ? 'selected' : '' }}>Vermont</option>

                        <option value="VA" {{ Auth::user()->born_raised_us ==  "VA" ? 'selected' : '' }}>Virginia</option>

                        <option value="WA" {{ Auth::user()->born_raised_us ==  "WA" ? 'selected' : '' }}>Washington</option>

                        <option value="WV" {{ Auth::user()->born_raised_us ==  "WV" ? 'selected' : '' }}>West Virginia</option>

                        <option value="WI" {{ Auth::user()->born_raised_us ==  "WI" ? 'selected' : '' }}>Wisconsin</option>

                        <option value="WY" {{ Auth::user()->born_raised_us ==  "WY" ? 'selected' : '' }}>Wyoming</option>


                    </select>

                </div>

                <div class="col-12 col-md-6 sole-share-details">

                    <label class="form-label" for="basicSelect">Location Goal - State</label>

                    <select class="form-select" id="basicSelect" name="location_global" value="{{Auth::user()->location_goal}}">

                       <option value="">Please select your location goal state</option>
                        <option value="AL" {{ Auth::user()->location_global ==  "AL" ? 'selected' : '' }}>Alabama</option>

                        <option value="AK" {{ Auth::user()->location_global ==  "AK" ? 'selected' : '' }}>Alaska</option>

                        <option value="AZ" {{ Auth::user()->location_global ==  "AZ" ? 'selected' : '' }}>Arizona</option>

                        <option value="AR" {{Auth::user()->location_global ==  "AR" ? 'selected' : '' }}>Arkansas</option>

                        <option value="CA" {{ Auth::user()->location_global ==  "CA" ? 'selected' : '' }}>California</option>

                        <option value="CO" {{ Auth::user()->location_global ==  "CO" ? 'selected' : '' }}>Colorado</option>

                        <option value="CT" {{ Auth::user()->location_global ==  "CT" ? 'selected' : '' }}>Connecticut</option>

                        <option value="DE" {{ Auth::user()->location_global ==  "DE" ? 'selected' : '' }}>Delaware</option>

                        <option value="DC" {{ Auth::user()->location_global ==  "DC" ? 'selected' : '' }}>District Of Columbia</option>

                        <option value="FL" {{ Auth::user()->location_global ==  "FL" ? 'selected' : '' }}>Florida</option>

                        <option value="GA" {{ Auth::user()->location_global ==  "GA" ? 'selected' : '' }}>Georgia</option>

                        <option value="HI" {{ Auth::user()->location_global ==  "HI" ? 'selected' : '' }}>Hawaii</option>

                        <option value="ID" {{ Auth::user()->location_global ==  "ID" ? 'selected' : '' }}>Idaho</option>

                        <option value="IL" {{ Auth::user()->location_global ==  "IL" ? 'selected' : '' }}>Illinois</option>

                        <option value="IN" {{ Auth::user()->location_global ==  "IN" ? 'selected' : '' }}>Indiana</option>

                        <option value="IA" {{ Auth::user()->location_global ==  "IA" ? 'selected' : '' }}>Iowa</option>

                        <option value="KS" {{ Auth::user()->location_global ==  "KS" ? 'selected' : '' }}>Kansas</option>

                        <option value="KY" {{ Auth::user()->location_global ==  "KY" ? 'selected' : '' }}>Kentucky</option>

                        <option value="LA" {{ Auth::user()->location_global ==  "LA" ? 'selected' : '' }}>Louisiana</option>

                        <option value="ME" {{ Auth::user()->location_global ==  "ME" ? 'selected' : '' }}>Maine</option>

                        <option value="MD" {{ Auth::user()->location_global ==  "MD" ? 'selected' : '' }}>Maryland</option>

                        <option value="MA" {{ Auth::user()->location_global ==  "MA" ? 'selected' : '' }}>Massachusetts</option>

                        <option value="MI" {{ Auth::user()->location_global ==  "MI" ? 'selected' : '' }}>Michigan</option>

                        <option value="MN" {{ Auth::user()->location_global ==  "MN" ? 'selected' : '' }}>Minnesota</option>

                        <option value="MS" {{ Auth::user()->location_global ==  "MS" ? 'selected' : '' }}>Mississippi</option>

                        <option value="MO" {{ Auth::user()->location_global ==  "MO" ? 'selected' : '' }}>Missouri</option>

                        <option value="MT" {{ Auth::user()->location_global ==  "MT" ? 'selected' : '' }}>Montana</option>

                        <option value="NE" {{ Auth::user()->location_global ==  "NE" ? 'selected' : '' }}>Nebraska</option>

                        <option value="NV" {{ Auth::user()->location_global ==  "NV" ? 'selected' : '' }}>Nevada</option>

                        <option value="NH" {{ Auth::user()->location_global ==  "NH" ? 'selected' : '' }}>New Hampshire</option>

                        <option value="NJ" {{ Auth::user()->location_global ==  "AK" ? 'selected' : '' }}>New Jersey</option>

                        <option value="NM" {{ Auth::user()->location_global ==  "AK" ? 'selected' : '' }}>New Mexico</option>

                        <option value="NY" {{ Auth::user()->location_global ==  "AK" ? 'selected' : '' }}>New York</option>

                        <option value="NC" {{ Auth::user()->location_global ==  "NC" ? 'selected' : '' }}>North Carolina</option>

                        <option value="ND" {{ Auth::user()->location_global ==  "ND" ? 'selected' : '' }}>North Dakota</option>

                        <option value="OH" {{ Auth::user()->location_global ==  "OH" ? 'selected' : '' }}>Ohio</option>

                        <option value="OK" {{ Auth::user()->location_global ==  "AK" ? 'selected' : '' }}>Oklahoma</option>

                        <option value="OR" {{ Auth::user()->location_global ==  "OR" ? 'selected' : '' }}>Oregon</option>

                        <option value="PA" {{ Auth::user()->location_global ==  "PA" ? 'selected' : '' }}>Pennsylvania</option>

                        <option value="RI" {{ Auth::user()->location_global ==  "RI" ? 'selected' : '' }}>Rhode Island</option>

                        <option value="SC" {{ Auth::user()->location_global ==  "SC" ? 'selected' : '' }}>South Carolina</option>

                        <option value="SD" {{ Auth::user()->location_global ==  "SD" ? 'selected' : '' }}>South Dakota</option>

                        <option value="TN" {{ Auth::user()->location_global ==  "TN" ? 'selected' : '' }}>Tennessee</option>

                        <option value="TX" {{ Auth::user()->location_global ==  "TX" ? 'selected' : '' }}>Texas</option>

                        <option value="UT" {{ Auth::user()->location_global ==  "UT" ? 'selected' : '' }}>Utah</option>

                        <option value="VT" {{ Auth::user()->location_global ==  "VT" ? 'selected' : '' }}>Vermont</option>

                        <option value="VA" {{ Auth::user()->location_global ==  "VA" ? 'selected' : '' }}>Virginia</option>

                        <option value="WA" {{ Auth::user()->location_global ==  "WA" ? 'selected' : '' }}>Washington</option>

                        <option value="WV" {{ Auth::user()->location_global ==  "WV" ? 'selected' : '' }}>West Virginia</option>

                        <option value="WI" {{ Auth::user()->location_global ==  "WI" ? 'selected' : '' }}>Wisconsin</option>

                        <option value="WY" {{ Auth::user()->location_global ==  "WY" ? 'selected' : '' }}>Wyoming</option>
                    </select>

                </div> 
                @endif
                @if(auth()->user()->role_id == 4)
                <div class="col-12 col-md-6">

                    <label class="form-label" for="basicSelect">Can Help Students Moving to: State</label>

                    <select class="form-select" id="basicSelect" name="student_move_to_state" value="{{Auth::user()->student_move_to_state}}">
                        <option value="">Please select your students move to state</option>
                        <option value="AL" {{ Auth::user()->student_move_to_state ==  "AL" ? 'selected' : '' }}>Alabama</option>

                        <option value="AK" {{ Auth::user()->student_move_to_state ==  "AK" ? 'selected' : '' }}>Alaska</option>

                        <option value="AZ" {{ Auth::user()->student_move_to_state ==  "AZ" ? 'selected' : '' }}>Arizona</option>

                        <option value="AR" {{Auth::user()->student_move_to_state ==  "AR" ? 'selected' : '' }}>Arkansas</option>

                        <option value="CA" {{ Auth::user()->student_move_to_state ==  "CA" ? 'selected' : '' }}>California</option>

                        <option value="CO" {{ Auth::user()->student_move_to_state ==  "CO" ? 'selected' : '' }}>Colorado</option>

                        <option value="CT" {{ Auth::user()->student_move_to_state ==  "CT" ? 'selected' : '' }}>Connecticut</option>

                        <option value="DE" {{ Auth::user()->student_move_to_state ==  "DE" ? 'selected' : '' }}>Delaware</option>

                        <option value="DC" {{ Auth::user()->student_move_to_state ==  "DC" ? 'selected' : '' }}>District Of Columbia</option>

                        <option value="FL" {{ Auth::user()->student_move_to_state ==  "FL" ? 'selected' : '' }}>Florida</option>

                        <option value="GA" {{ Auth::user()->student_move_to_state ==  "GA" ? 'selected' : '' }}>Georgia</option>

                        <option value="HI" {{ Auth::user()->student_move_to_state ==  "HI" ? 'selected' : '' }}>Hawaii</option>

                        <option value="ID" {{ Auth::user()->student_move_to_state ==  "ID" ? 'selected' : '' }}>Idaho</option>

                        <option value="IL" {{ Auth::user()->student_move_to_state ==  "IL" ? 'selected' : '' }}>Illinois</option>

                        <option value="IN" {{ Auth::user()->student_move_to_state ==  "IN" ? 'selected' : '' }}>Indiana</option>

                        <option value="IA" {{ Auth::user()->student_move_to_state ==  "IA" ? 'selected' : '' }}>Iowa</option>

                        <option value="KS" {{ Auth::user()->student_move_to_state ==  "KS" ? 'selected' : '' }}>Kansas</option>

                        <option value="KY" {{ Auth::user()->student_move_to_state ==  "KY" ? 'selected' : '' }}>Kentucky</option>

                        <option value="LA" {{ Auth::user()->student_move_to_state ==  "LA" ? 'selected' : '' }}>Louisiana</option>

                        <option value="ME" {{ Auth::user()->student_move_to_state ==  "ME" ? 'selected' : '' }}>Maine</option>

                        <option value="MD" {{ Auth::user()->student_move_to_state ==  "MD" ? 'selected' : '' }}>Maryland</option>

                        <option value="MA" {{ Auth::user()->student_move_to_state ==  "MA" ? 'selected' : '' }}>Massachusetts</option>

                        <option value="MI" {{ Auth::user()->student_move_to_state ==  "MI" ? 'selected' : '' }}>Michigan</option>

                        <option value="MN" {{ Auth::user()->student_move_to_state ==  "MN" ? 'selected' : '' }}>Minnesota</option>

                        <option value="MS" {{ Auth::user()->student_move_to_state ==  "MS" ? 'selected' : '' }}>Mississippi</option>

                        <option value="MO" {{ Auth::user()->student_move_to_state ==  "MO" ? 'selected' : '' }}>Missouri</option>

                        <option value="MT" {{ Auth::user()->student_move_to_state ==  "MT" ? 'selected' : '' }}>Montana</option>

                        <option value="NE" {{ Auth::user()->student_move_to_state ==  "NE" ? 'selected' : '' }}>Nebraska</option>

                        <option value="NV" {{ Auth::user()->student_move_to_state ==  "NV" ? 'selected' : '' }}>Nevada</option>

                        <option value="NH" {{ Auth::user()->student_move_to_state ==  "NH" ? 'selected' : '' }}>New Hampshire</option>

                        <option value="NJ" {{ Auth::user()->student_move_to_state ==  "AK" ? 'selected' : '' }}>New Jersey</option>

                        <option value="NM" {{ Auth::user()->student_move_to_state ==  "AK" ? 'selected' : '' }}>New Mexico</option>

                        <option value="NY" {{ Auth::user()->student_move_to_state ==  "AK" ? 'selected' : '' }}>New York</option>

                        <option value="NC" {{ Auth::user()->student_move_to_state ==  "NC" ? 'selected' : '' }}>North Carolina</option>

                        <option value="ND" {{ Auth::user()->student_move_to_state ==  "ND" ? 'selected' : '' }}>North Dakota</option>

                        <option value="OH" {{ Auth::user()->student_move_to_state ==  "OH" ? 'selected' : '' }}>Ohio</option>

                        <option value="OK" {{ Auth::user()->student_move_to_state ==  "AK" ? 'selected' : '' }}>Oklahoma</option>

                        <option value="OR" {{ Auth::user()->student_move_to_state ==  "OR" ? 'selected' : '' }}>Oregon</option>

                        <option value="PA" {{ Auth::user()->student_move_to_state ==  "PA" ? 'selected' : '' }}>Pennsylvania</option>

                        <option value="RI" {{ Auth::user()->student_move_to_state ==  "RI" ? 'selected' : '' }}>Rhode Island</option>

                        <option value="SC" {{ Auth::user()->student_move_to_state ==  "SC" ? 'selected' : '' }}>South Carolina</option>

                        <option value="SD" {{ Auth::user()->student_move_to_state ==  "SD" ? 'selected' : '' }}>South Dakota</option>

                        <option value="TN" {{ Auth::user()->student_move_to_state ==  "TN" ? 'selected' : '' }}>Tennessee</option>

                        <option value="TX" {{ Auth::user()->student_move_to_state ==  "TX" ? 'selected' : '' }}>Texas</option>

                        <option value="UT" {{ Auth::user()->student_move_to_state ==  "UT" ? 'selected' : '' }}>Utah</option>

                        <option value="VT" {{ Auth::user()->student_move_to_state ==  "VT" ? 'selected' : '' }}>Vermont</option>

                        <option value="VA" {{ Auth::user()->student_move_to_state ==  "VA" ? 'selected' : '' }}>Virginia</option>

                        <option value="WA" {{ Auth::user()->student_move_to_state ==  "WA" ? 'selected' : '' }}>Washington</option>

                        <option value="WV" {{ Auth::user()->student_move_to_state ==  "WV" ? 'selected' : '' }}>West Virginia</option>

                        <option value="WI" {{ Auth::user()->student_move_to_state ==  "WI" ? 'selected' : '' }}>Wisconsin</option>

                        <option value="WY" {{ Auth::user()->student_move_to_state ==  "WY" ? 'selected' : '' }}>Wyoming</option>


                    </select>

                </div>


                <div class="col-12 col-md-6">

<label class="form-label" for="basicSelect">Can Help Students Moving to: City</label>

<select class="form-select" id="basicSelect" name="student_move_to_city" value="{{Auth::user()->student_move_to_city}}">
    <option value="">Please select your students move to city</option>
    <option value="1" {{ Auth::user()->student_move_to_city ==  "1" ? 'selected' : '' }}>New York City, NY</option>

    <option value="2" {{ Auth::user()->student_move_to_city ==  "2" ? 'selected' : '' }}>Los Angeles, CA</option>

    <option value="3" {{ Auth::user()->student_move_to_city ==  "3" ? 'selected' : '' }}>Chicago, IL</option>

    <option value="4" {{Auth::user()->student_move_to_city ==  "4" ? 'selected' : '' }}>Houston, TX</option>

    <option value="5" {{ Auth::user()->student_move_to_city ==  "5" ? 'selected' : '' }}>Phoenix, AZ</option>

    <option value="6" {{ Auth::user()->student_move_to_city ==  "6" ? 'selected' : '' }}>Philadelphia, PA</option>

    <option value="7" {{ Auth::user()->student_move_to_city ==  "7" ? 'selected' : '' }}>San Antonio, TX</option>

    <option value="8" {{ Auth::user()->student_move_to_city ==  "8" ? 'selected' : '' }}>San Diego,CA</option>

    <option value="9" {{ Auth::user()->student_move_to_city ==  "9" ? 'selected' : '' }}>Dallas, TX</option>

    <option value="10" {{ Auth::user()->student_move_to_city ==  "10" ? 'selected' : '' }}>San Jose, CA</option>

    <option value="11" {{ Auth::user()->student_move_to_city ==  "11" ? 'selected' : '' }}>Austin, Tx</option>

    <option value="12" {{ Auth::user()->student_move_to_city ==  "12" ? 'selected' : '' }}>Jacksonville, FL</option>

    <option value="13" {{ Auth::user()->student_move_to_city ==  "13" ? 'selected' : '' }}>Fort Worth, TX</option>

    <option value="14" {{ Auth::user()->student_move_to_city ==  "14" ? 'selected' : '' }}>Columbus, OH</option>

    <option value="15" {{ Auth::user()->student_move_to_city ==  "15" ? 'selected' : '' }}>Indianapolis, IN</option>

    <option value="16" {{ Auth::user()->student_move_to_city ==  "16" ? 'selected' : '' }}>Charlotte, NC</option>

    <option value="17" {{ Auth::user()->student_move_to_city ==  "17" ? 'selected' : '' }}>San Francisco, CA</option>

    <option value="18" {{ Auth::user()->student_move_to_city ==  "18" ? 'selected' : '' }}>Seattle, WA</option>

    <option value="19" {{ Auth::user()->student_move_to_city ==  "19" ? 'selected' : '' }}>Denver, CO</option>

    <option value="20" {{ Auth::user()->student_move_to_city ==  "20" ? 'selected' : '' }}>Washington, DC</option>

    <option value="21" {{ Auth::user()->student_move_to_city ==  "21" ? 'selected' : '' }}>Nashville, TN</option>

    <option value="22" {{ Auth::user()->student_move_to_city ==  "22" ? 'selected' : '' }}>Oklahoma City, OK</option>

    <option value="23" {{ Auth::user()->student_move_to_city ==  "23" ? 'selected' : '' }}>El Paso, Tx</option>

    <option value="24" {{ Auth::user()->student_move_to_city ==  "24" ? 'selected' : '' }}>Boston, MA</option>

    <option value="25" {{ Auth::user()->student_move_to_city ==  "25" ? 'selected' : '' }}>Portland, OR</option>

    <option value="26" {{ Auth::user()->student_move_to_city ==  "26" ? 'selected' : '' }}>Las Vegas, NV</option>

    <option value="27" {{ Auth::user()->student_move_to_city ==  "27" ? 'selected' : '' }}>Detroit, MI</option>

    <option value="28" {{ Auth::user()->student_move_to_city ==  "28" ? 'selected' : '' }}>Memphis, TX</option>

    <option value="29" {{ Auth::user()->student_move_to_city ==  "29" ? 'selected' : '' }}>Louisville, KY</option>

    <option value="30" {{ Auth::user()->student_move_to_city ==  "30" ? 'selected' : '' }}>Baltimore, MD</option>

    <option value="31" {{ Auth::user()->student_move_to_city ==  "31" ? 'selected' : '' }}>New Jersey</option>

    <option value="32" {{ Auth::user()->student_move_to_city ==  "32" ? 'selected' : '' }}>New Mexico</option>

    <option value="33" {{ Auth::user()->student_move_to_city ==  "33" ? 'selected' : '' }}>New York</option>

    <option value="34" {{ Auth::user()->student_move_to_city ==  "34" ? 'selected' : '' }}>North Carolina</option>

    <option value="35" {{ Auth::user()->student_move_to_city ==  "35" ? 'selected' : '' }}>North Dakota</option>

    <option value="36" {{ Auth::user()->student_move_to_city ==  "36" ? 'selected' : '' }}>Ohio</option>

    <option value="37" {{ Auth::user()->student_move_to_city ==  "37" ? 'selected' : '' }}>Oklahoma</option>

    <option value="38" {{ Auth::user()->student_move_to_city ==  "38" ? 'selected' : '' }}>Oregon</option>

    <option value="39" {{ Auth::user()->student_move_to_city ==  "39" ? 'selected' : '' }}>Pennsylvania</option>

    <option value="40" {{ Auth::user()->student_move_to_city ==  "40" ? 'selected' : '' }}>Rhode Island</option>

    <option value="41" {{ Auth::user()->student_move_to_city ==  "41" ? 'selected' : '' }}>South Carolina</option>

    <option value="42" {{ Auth::user()->student_move_to_city ==  "42" ? 'selected' : '' }}>South Dakota</option>

    <option value="43" {{ Auth::user()->student_move_to_city ==  "43" ? 'selected' : '' }}>Tennessee</option>

    <option value="44" {{ Auth::user()->student_move_to_city ==  "44" ? 'selected' : '' }}>Texas</option>

    <option value="45" {{ Auth::user()->student_move_to_city ==  "45" ? 'selected' : '' }}>Utah</option>

    <option value="46" {{ Auth::user()->student_move_to_city ==  "46" ? 'selected' : '' }}>Vermont</option>

    <option value="47" {{ Auth::user()->student_move_to_city ==  "47" ? 'selected' : '' }}>Virginia</option>

    <option value="48" {{ Auth::user()->student_move_to_city ==  "48" ? 'selected' : '' }}>Washington</option>

    <option value="49" {{ Auth::user()->student_move_to_city ==  "49" ? 'selected' : '' }}>West Virginia</option>

    <option value="50" {{ Auth::user()->student_move_to_city ==  "50" ? 'selected' : '' }}>Wisconsin</option>

    <option value="51" {{ Auth::user()->student_move_to_city ==  "51" ? 'selected' : '' }}>Wyoming</option>


</select>

</div>
    



<div class="col-12 col-md-6">

<label class="form-label" for="basicSelect">Can Help Students Moving to: Country</label>

<select class="form-select" id="basicSelect" name="student_move_to_country" value="{{Auth::user()->student_move_to_country}}">
    <option value="">Please select your students move to city</option>
    <option value="1" {{ Auth::user()->student_move_to_country ==  "1" ? 'selected' : '' }}>NAlbania</option>

    <option value="2" {{ Auth::user()->student_move_to_country ==  "2" ? 'selected' : '' }}>Andorra</option>

    <option value="3" {{ Auth::user()->student_move_to_country ==  "3" ? 'selected' : '' }}>Armenia</option>

    <option value="4" {{Auth::user()->student_move_to_country ==  "4" ? 'selected' : '' }}>Austria</option>

    <option value="5" {{ Auth::user()->student_move_to_country ==  "5" ? 'selected' : '' }}>Azerbaijan</option>

    <option value="6" {{ Auth::user()->student_move_to_country ==  "6" ? 'selected' : '' }}>Belarus</option>

    <option value="7" {{ Auth::user()->student_move_to_country ==  "7" ? 'selected' : '' }}>Belgium</option>

    <option value="8" {{ Auth::user()->student_move_to_country ==  "8" ? 'selected' : '' }}>San Diego,CA</option>

    <option value="9" {{ Auth::user()->student_move_to_country ==  "9" ? 'selected' : '' }}>Bosnia and Herzegovina</option>

    <option value="10" {{ Auth::user()->student_move_to_country ==  "10" ? 'selected' : '' }}>Bulgaria</option>

    <option value="11" {{ Auth::user()->student_move_to_country ==  "11" ? 'selected' : '' }}>Croatia</option>

    <option value="12" {{ Auth::user()->student_move_to_country ==  "12" ? 'selected' : '' }}>Cyprus</option>

    <option value="13" {{ Auth::user()->student_move_to_country ==  "13" ? 'selected' : '' }}>Czechia</option>

    <option value="14" {{ Auth::user()->student_move_to_country ==  "14" ? 'selected' : '' }}>Denmark</option>

    <option value="15" {{ Auth::user()->student_move_to_country ==  "15" ? 'selected' : '' }}>Estonia</option>

    <option value="16" {{ Auth::user()->student_move_to_country ==  "16" ? 'selected' : '' }}>Finland</option>

    <option value="17" {{ Auth::user()->student_move_to_country ==  "17" ? 'selected' : '' }}>France</option>

    <option value="18" {{ Auth::user()->student_move_to_country ==  "18" ? 'selected' : '' }}>Georgia</option>

    <option value="19" {{ Auth::user()->student_move_to_country ==  "19" ? 'selected' : '' }}>Germany</option>

    <option value="20" {{ Auth::user()->student_move_to_country ==  "20" ? 'selected' : '' }}>Greece</option>

    <option value="21" {{ Auth::user()->student_move_to_country ==  "21" ? 'selected' : '' }}>Hungary</option>

    <option value="22" {{ Auth::user()->student_move_to_country ==  "22" ? 'selected' : '' }}>Iceland</option>

    <option value="23" {{ Auth::user()->student_move_to_country ==  "23" ? 'selected' : '' }}>Ireland</option>

    <option value="24" {{ Auth::user()->student_move_to_country ==  "24" ? 'selected' : '' }}>Italy</option>

    <option value="25" {{ Auth::user()->student_move_to_country ==  "25" ? 'selected' : '' }}>Kazakhstan</option>

    <option value="26" {{ Auth::user()->student_move_to_country ==  "26" ? 'selected' : '' }}>Kosovo</option>

    <option value="27" {{ Auth::user()->student_move_to_country ==  "27" ? 'selected' : '' }}>Latvia</option>

    <option value="28" {{ Auth::user()->student_move_to_country ==  "28" ? 'selected' : '' }}>Liechtenstein</option>

    <option value="29" {{ Auth::user()->student_move_to_country ==  "29" ? 'selected' : '' }}>Lithuania</option>

    <option value="30" {{ Auth::user()->student_move_to_country ==  "30" ? 'selected' : '' }}>Malta</option>

    <option value="31" {{ Auth::user()->student_move_to_country ==  "31" ? 'selected' : '' }}>Moldova</option>

    <option value="32" {{ Auth::user()->student_move_to_country ==  "32" ? 'selected' : '' }}>Monaco </option>

    <option value="33" {{ Auth::user()->student_move_to_country ==  "33" ? 'selected' : '' }}> Montenegro</option>

    <option value="34" {{ Auth::user()->student_move_to_country ==  "34" ? 'selected' : '' }}>Netherlands</option>

    <option value="35" {{ Auth::user()->student_move_to_country ==  "35" ? 'selected' : '' }}>Netherlands</option>

    <option value="36" {{ Auth::user()->student_move_to_country ==  "36" ? 'selected' : '' }}>North Macedonia</option>

    <option value="37" {{ Auth::user()->student_move_to_country ==  "37" ? 'selected' : '' }}>Norway</option>

    <option value="38" {{ Auth::user()->student_move_to_country ==  "38" ? 'selected' : '' }}>Poland</option>

    <option value="39" {{ Auth::user()->student_move_to_country ==  "39" ? 'selected' : '' }}>Portugal</option>

    <option value="40" {{ Auth::user()->student_move_to_country ==  "40" ? 'selected' : '' }}>Romania</option>

    <option value="41" {{ Auth::user()->student_move_to_country ==  "41" ? 'selected' : '' }}>Russia</option>

    <option value="42" {{ Auth::user()->student_move_to_country ==  "42" ? 'selected' : '' }}>San Marino</option>

    <option value="43" {{ Auth::user()->student_move_to_country ==  "43" ? 'selected' : '' }}>Scotland</option>

    <option value="44" {{ Auth::user()->student_move_to_country ==  "44" ? 'selected' : '' }}>Serbia</option>

    <option value="45" {{ Auth::user()->student_move_to_country ==  "45" ? 'selected' : '' }}>Slovakia</option>

    <option value="46" {{ Auth::user()->student_move_to_country ==  "46" ? 'selected' : '' }}>Slovenia</option>

    <option value="47" {{ Auth::user()->student_move_to_country ==  "47" ? 'selected' : '' }}>Spain</option>

    <option value="48" {{ Auth::user()->student_move_to_country ==  "48" ? 'selected' : '' }}>Sweden</option>

    <option value="49" {{ Auth::user()->student_move_to_country ==  "49" ? 'selected' : '' }}>Switzerland </option>

    <option value="50" {{ Auth::user()->student_move_to_country ==  "50" ? 'selected' : '' }}>Turkey</option>

    <option value="51" {{ Auth::user()->student_move_to_country ==  "51" ? 'selected' : '' }}>Ukraine</option>
    <option value="52" {{ Auth::user()->student_move_to_country ==  "52" ? 'selected' : '' }}>United Kingdom (UK)</option>

    <option value="53" {{ Auth::user()->student_move_to_country ==  "53" ? 'selected' : '' }}>Vatican City (Holy See)</option>


</select>

</div>

           @endif                            

                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary mt-1 me-1">Update</button>
                                            <button type="reset" class="btn btn-outline-secondary mt-1">Discard</button>
                                        </div>
                                    </div>
                                </form>
                                <!--/ form -->
                            </div>
                        </div>


                        <!--/ profile -->
                    </div>
                </div>

            </div>
        </div>

    <!-- END: Content-->


@endsection


@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css"/>

@endsection



@section('scripts')
<script src="https://rawgit.com/RobinHerbots/jquery.inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>
<script>
    $('.phone-number-mask').inputmask('999.999.9999');
</script>

@endsection
