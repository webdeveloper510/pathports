@extends('backend.layouts.app')



@section('title','Interest Area List || PathPorts')



@section('content')



<!-- BEGIN: Content-->



    <div class="content-wrapper container-xxl p-0">

        <div class="content-header row">

            <div class="content-header-left col-md-9 col-12 mb-2">

                <div class="row breadcrumbs-top">

                    <div class="col-12">

                        <h2 class="content-header-title float-start mb-0">Interest Areas</h2>

                        <div class="breadcrumb-wrapper">

                            <ol class="breadcrumb">

                                <li class="breadcrumb-item"><a href="index.html">Interest Areas</a>

                                </li>

                                <li class="breadcrumb-item"><a href="#">Lists</a>

                                </li>

                                <li class="breadcrumb-item active">Add Interest Areas

                                </li>

                            </ol>

                        </div>

                    </div>

                </div>

            </div>



        </div>

        <div class="content-body">

            <section id="">

                <div class="row">

                    <div class="col-12">

                        <div class="card">

                            <div class="card-header">

                                <!-- <h4 class="card-title"></h4> -->

                            </div>

                            <div class="card-body">

                                <form id="editUserForm" class="row gy-1 pt-75" onsubmit="return false">



                                    <div class="col-12 col-md-12">

                                        <!-- <label class="form-label" for="modalEditUserPhone">Interest Areas</label> -->

                                        <h1>Interest Areas</h1>

                                        <br>

                                        <div class="demo-inline-spacing">
                                            <div class="d-flex">

                                                <div class="form-check form-check-inline interest-area-check">

                                                    <input class="form-check-input checkbox-input" type="checkbox" id="inlineCheckbox1" value="checked" checked="">

                                                    <label class="form-check-label" for="inlineCheckbox1">Physical Therapy</label>

                                                </div>

                                                <div class="form-check form-check-inline interest-area-check">

                                                    <input class="form-check-input checkbox-input" type="checkbox" id="inlineCheckbox2" value="unchecked">

                                                    <label class="form-check-label" for="inlineCheckbox2">Nursing</label>

                                                </div>

                                                <div class="form-check form-check-inline interest-area-check">

                                                    <input class="form-check-input checkbox-input" type="checkbox" id="inlineCheckbox2" value="unchecked">

                                                    <label class="form-check-label" for="inlineCheckbox2">Physicians Asst</label>

                                                </div>

                                                <div class="form-check form-check-inline interest-area-check">

                                                    <input class="form-check-input checkbox-input" type="checkbox" id="inlineCheckbox2" value="unchecked">

                                                    <label class="form-check-label" for="inlineCheckbox2">Medical and Health Services</label>

                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <div class="form-check form-check-inline interest-area-check">

                                                    <input class="form-check-input checkbox-input" type="checkbox" id="inlineCheckbox2" value="unchecked">

                                                    <label class="form-check-label" for="inlineCheckbox2">Speech Pathologist</label>

                                                </div>

                                                <div class="form-check form-check-inline interest-area-check">

                                                    <input class="form-check-input checkbox-input" type="checkbox" id="inlineCheckbox2" value="unchecked">

                                                    <label class="form-check-label" for="inlineCheckbox2">Physician</label>

                                                </div>

                                                <div class="form-check form-check-inline interest-area-check">

                                                    <input class="form-check-input checkbox-input" type="checkbox" id="inlineCheckbox2" value="unchecked">

                                                    <label class="form-check-label" for="inlineCheckbox2">Respiratory Therapist</label>

                                                </div>

                                                <div class="form-check form-check-inline interest-area-check">

                                                    <input class="form-check-input checkbox-input" type="checkbox" id="inlineCheckbox2" value="unchecked">

                                                    <label class="form-check-label" for="inlineCheckbox2">Bio-Tech</label>

                                                </div>
                                            </div>
                                            <div class="d-flex">

                                                <div class="form-check form-check-inline interest-area-check">

                                                    <input class="form-check-input checkbox-input" type="checkbox" id="inlineCheckbox2" value="unchecked">

                                                    <label class="form-check-label" for="inlineCheckbox2">Nurse Anesthetist</label>

                                                </div>

                                                <div class="form-check form-check-inline interest-area-check">

                                                    <input class="form-check-input checkbox-input" type="checkbox" id="inlineCheckbox2" value="unchecked">

                                                    <label class="form-check-label" for="inlineCheckbox2">Medical Sonographer</label>

                                                </div>

                                                <div class="form-check form-check-inline interest-area-check">

                                                    <input class="form-check-input checkbox-input" type="checkbox" id="inlineCheckbox2" value="unchecked">

                                                    <label class="form-check-label" for="inlineCheckbox2">Veterinarian</label>

                                                </div>

                                                <div class="form-check form-check-inline interest-area-check">

                                                    <input class="form-check-input checkbox-input" type="checkbox" id="inlineCheckbox2" value="unchecked">

                                                    <label class="form-check-label" for="inlineCheckbox2">Occupational Therapy</label>

                                                </div>


                                            </div>


                                            <div class="d-flex">

                                                <div class="form-check form-check-inline interest-area-check">

                                                    <input class="form-check-input checkbox-input" type="checkbox" id="inlineCheckbox2" value="unchecked">

                                                    <label class="form-check-label" for="inlineCheckbox2">Substance/Behavior Council</label>

                                                </div>

                                                <div class="form-check form-check-inline interest-area-check">

                                                    <input class="form-check-input checkbox-input" type="checkbox" id="inlineCheckbox2" value="unchecked">

                                                    <label class="form-check-label" for="inlineCheckbox2">Pediatrician</label>

                                                </div>

                                                <div class="form-check form-check-inline interest-area-check">

                                                    <input class="form-check-input checkbox-input" type="checkbox" id="inlineCheckbox2" value="unchecked">

                                                    <label class="form-check-label" for="inlineCheckbox2">Optometrist</label>

                                                </div>

                                                <div class="form-check form-check-inline interest-area-check">

                                                    <input class="form-check-input checkbox-input" type="checkbox" id="inlineCheckbox2" value="unchecked">

                                                    <label class="form-check-label" for="inlineCheckbox2">Epidemiologist/Medical Scientist</label>

                                                </div>


                                            </div>

                                            <div class="d-flex">

                                            <div class="form-check form-check-inline interest-area-check">

                                                <input class="form-check-input checkbox-input" type="checkbox" id="inlineCheckbox2" value="unchecked">

                                                <label class="form-check-label" for="inlineCheckbox2">Anesthesiologist</label>

                                            </div>

                                            <div class="form-check form-check-inline interest-area-check">

                                                <input class="form-check-input checkbox-input" type="checkbox" id="inlineCheckbox2" value="unchecked">

                                                <label class="form-check-label" for="inlineCheckbox2">Dentist/Hygeneist</label>

                                            </div>

                                            <div class="form-check form-check-inline interest-area-check">

                                                <input class="form-check-input checkbox-input" type="checkbox" id="inlineCheckbox2" value="unchecked">

                                                <label class="form-check-label" for="inlineCheckbox2">Psychiatrist</label>

                                            </div>

                                            <div class="form-check form-check-inline interest-area-check">

                                                <input class="form-check-input checkbox-input" type="checkbox" id="inlineCheckbox2" value="unchecked">

                                                <label class="form-check-label" for="inlineCheckbox2">Phycologist</label>

                                            </div>


                                        </div>


                                        <div class="d-flex">

                                        <div class="form-check form-check-inline interest-area-check">

                                            <input class="form-check-input checkbox-input" type="checkbox" id="inlineCheckbox2" value="unchecked">

                                            <label class="form-check-label" for="inlineCheckbox2">Genetics</label>

                                        </div>

                                        <div class="form-check form-check-inline interest-area-check">

                                            <input class="form-check-input checkbox-input" type="checkbox" id="inlineCheckbox2" value="unchecked">

                                            <label class="form-check-label" for="inlineCheckbox2">Chiropractor</label>

                                        </div>

                                        <div class="form-check form-check-inline interest-area-check">

                                            <input class="form-check-input checkbox-input" type="checkbox" id="inlineCheckbox2" value="unchecked">

                                            <label class="form-check-label" for="inlineCheckbox2">Pharmacist</label>

                                        </div>

                                        <div class="form-check form-check-inline interest-area-check">

                                            <input class="form-check-input checkbox-input" type="checkbox" id="inlineCheckbox2" value="unchecked">

                                            <label class="form-check-label" for="inlineCheckbox2">Radiaion</label>

                                        </div>
                                    </div>


                                    <div class="d-flex">

                                    <div class="form-check form-check-inline interest-area-check">

                                        <input class="form-check-input checkbox-input" type="checkbox" id="inlineCheckbox2" value="unchecked">

                                        <label class="form-check-label" for="inlineCheckbox2">Dietician</label>

                                    </div>

                                    <div class="form-check form-check-inline interest-area-check">

                                        <input class="form-check-input checkbox-input" type="checkbox" id="inlineCheckbox2" value="unchecked">

                                        <label class="form-check-label" for="inlineCheckbox2">Info sec/Cyber Security</label>

                                    </div>

                                    <div class="form-check form-check-inline interest-area-check">

                                        <input class="form-check-input checkbox-input" type="checkbox" id="inlineCheckbox2" value="unchecked">

                                        <label class="form-check-label" for="inlineCheckbox2">Developer </label>

                                    </div>

                                    <div class="form-check form-check-inline interest-area-check">

                                        <input class="form-check-input checkbox-input" type="checkbox" id="inlineCheckbox2" value="unchecked">

                                        <label class="form-check-label" for="inlineCheckbox2">Data Scientist (AI)</label>

                                    </div>
                                    </div>

                                    <div class="d-flex">

                                    <div class="form-check form-check-inline interest-area-check">

                                        <input class="form-check-input checkbox-input" type="checkbox" id="inlineCheckbox2" value="unchecked">

                                        <label class="form-check-label" for="inlineCheckbox2">Statistician</label>

                                    </div>

                                    <div class="form-check form-check-inline interest-area-check">

                                        <input class="form-check-input checkbox-input" type="checkbox" id="inlineCheckbox2" value="unchecked">

                                        <label class="form-check-label" for="inlineCheckbox2">IT Manager</label>

                                    </div>

                                    <div class="form-check form-check-inline interest-area-check">

                                        <input class="form-check-input checkbox-input" type="checkbox" id="inlineCheckbox2" value="unchecked">

                                        <label class="form-check-label" for="inlineCheckbox2">Operations Analyst</label>

                                    </div>

                                    <div class="form-check form-check-inline interest-area-check">

                                        <input class="form-check-input checkbox-input" type="checkbox" id="inlineCheckbox2" value="unchecked">

                                        <label class="form-check-label" for="inlineCheckbox2">Logistician</label>

                                    </div>
                                    </div>

                                    <div class="d-flex">

                                        <div class="form-check form-check-inline interest-area-check">

                                            <input class="form-check-input checkbox-input" type="checkbox" id="inlineCheckbox2" value="unchecked">

                                            <label class="form-check-label" for="inlineCheckbox2">Computer Systems Analyst/Admin</label>

                                        </div>

                                        <div class="form-check form-check-inline interest-area-check">

                                            <input class="form-check-input checkbox-input" type="checkbox" id="inlineCheckbox2" value="unchecked">

                                            <label class="form-check-label" for="inlineCheckbox2">Web 3.0</label>

                                        </div>

                                        <div class="form-check form-check-inline interest-area-check">

                                            <input class="form-check-input checkbox-input" type="checkbox" id="inlineCheckbox2" value="unchecked">

                                            <label class="form-check-label" for="inlineCheckbox2">Cryptocurrency</label>

                                        </div>

                                        <div class="form-check form-check-inline interest-area-check">

                                            <input class="form-check-input checkbox-input" type="checkbox" id="inlineCheckbox2" value="unchecked">

                                            <label class="form-check-label" for="inlineCheckbox2">Database Administrator</label>

                                        </div>
                                        </div>

                                        <div class="d-flex">

                                        <div class="form-check form-check-inline interest-area-check">

                                            <input class="form-check-input checkbox-input" type="checkbox" id="inlineCheckbox2" value="unchecked">

                                            <label class="form-check-label" for="inlineCheckbox2">Computer Network Architect</label>

                                        </div>

                                        <div class="form-check form-check-inline interest-area-check">

                                            <input class="form-check-input checkbox-input" type="checkbox" id="inlineCheckbox2" value="unchecked">

                                            <label class="form-check-label" for="inlineCheckbox2">Networks</label>

                                        </div>

                                        <div class="form-check form-check-inline interest-area-check">

                                            <input class="form-check-input checkbox-input" type="checkbox" id="inlineCheckbox2" value="unchecked">

                                            <label class="form-check-label" for="inlineCheckbox2">DataCenter</label>

                                        </div>

                                        <div class="form-check form-check-inline interest-area-check">

                                            <input class="form-check-input checkbox-input" type="checkbox" id="inlineCheckbox2" value="unchecked">

                                            <label class="form-check-label" for="inlineCheckbox2">AI/ML/IoT</label>

                                        </div>
                                        </div>

                                        <div class="d-flex">

                                        <div class="form-check form-check-inline interest-area-check">

                                            <input class="form-check-input checkbox-input" type="checkbox" id="inlineCheckbox2" value="unchecked">

                                            <label class="form-check-label" for="inlineCheckbox2">Research</label>

                                        </div>

                                        <div class="form-check form-check-inline interest-area-check">

                                            <input class="form-check-input checkbox-input" type="checkbox" id="inlineCheckbox2" value="unchecked">

                                            <label class="form-check-label" for="inlineCheckbox2">Application Architecture</label>

                                        </div>

                                        <div class="form-check form-check-inline interest-area-check">

                                            <input class="form-check-input checkbox-input" type="checkbox" id="inlineCheckbox2" value="unchecked">

                                            <label class="form-check-label" for="inlineCheckbox2">Logistics</label>

                                        </div>

                                        <div class="form-check form-check-inline interest-area-check">

                                            <input class="form-check-input checkbox-input" type="checkbox" id="inlineCheckbox2" value="unchecked">

                                            <label class="form-check-label" for="inlineCheckbox2">Point of Sales</label>

                                        </div>
                                        </div>

                                        <div class="d-flex">

                                        <div class="form-check form-check-inline interest-area-check">

                                            <input class="form-check-input checkbox-input" type="checkbox" id="inlineCheckbox2" value="unchecked">

                                            <label class="form-check-label" for="inlineCheckbox2">Data</label>

                                        </div>

                                        <div class="form-check form-check-inline interest-area-check">

                                            <input class="form-check-input checkbox-input" type="checkbox" id="inlineCheckbox2" value="unchecked">

                                            <label class="form-check-label" for="inlineCheckbox2">Technology</label>

                                        </div>

                                        <div class="form-check form-check-inline interest-area-check">

                                            <input class="form-check-input checkbox-input" type="checkbox" id="inlineCheckbox2" value="unchecked">

                                            <label class="form-check-label" for="inlineCheckbox2">3D Printing/Manufacturing</label>

                                        </div>

                                        <div class="form-check form-check-inline interest-area-check">

                                            <input class="form-check-input checkbox-input" type="checkbox" id="inlineCheckbox2" value="unchecked">

                                            <label class="form-check-label" for="inlineCheckbox2">Financial Manager</label>

                                        </div>
                                        </div>

                                        <div class="d-flex">

                                        <div class="form-check form-check-inline interest-area-check">

                                            <input class="form-check-input checkbox-input" type="checkbox" id="inlineCheckbox2" value="unchecked">

                                            <label class="form-check-label" for="inlineCheckbox2">Lawyer</label>

                                        </div>

                                        <div class="form-check form-check-inline interest-area-check">

                                            <input class="form-check-input checkbox-input" type="checkbox" id="inlineCheckbox2" value="unchecked">

                                            <label class="form-check-label" for="inlineCheckbox2">Market Research Analyst</label>

                                        </div>

                                        <div class="form-check form-check-inline interest-area-check">

                                            <input class="form-check-input checkbox-input" type="checkbox" id="inlineCheckbox2" value="unchecked">

                                            <label class="form-check-label" for="inlineCheckbox2">Actuary</label>

                                        </div>

                                        <div class="form-check form-check-inline interest-area-check">

                                            <input class="form-check-input checkbox-input" type="checkbox" id="inlineCheckbox2" value="unchecked">

                                            <label class="form-check-label" for="inlineCheckbox2">Management Analyst</label>

                                        </div>
                                        </div>


                                        <div class="d-flex">

                                        <div class="form-check form-check-inline interest-area-check">

                                            <input class="form-check-input checkbox-input" type="checkbox" id="inlineCheckbox2" value="unchecked">

                                            <label class="form-check-label" for="inlineCheckbox2">Marketing</label>

                                        </div>

                                        <div class="form-check form-check-inline interest-area-check">

                                            <input class="form-check-input checkbox-input" type="checkbox" id="inlineCheckbox2" value="unchecked">

                                            <label class="form-check-label" for="inlineCheckbox2">Finance</label>

                                        </div>

                                        <div class="form-check form-check-inline interest-area-check">

                                            <input class="form-check-input checkbox-input" type="checkbox" id="inlineCheckbox2" value="unchecked">

                                            <label class="form-check-label" for="inlineCheckbox2">Accountant</label>

                                        </div>

                                        <div class="form-check form-check-inline interest-area-check">

                                            <input class="form-check-input checkbox-input" type="checkbox" id="inlineCheckbox2" value="unchecked">

                                            <label class="form-check-label" for="inlineCheckbox2">Economics</label>

                                        </div>
                                        </div>

                                        <div class="d-flex">

                                        <div class="form-check form-check-inline interest-area-check">

                                            <input class="form-check-input checkbox-input" type="checkbox" id="inlineCheckbox2" value="unchecked">

                                            <label class="form-check-label" for="inlineCheckbox2">Business Operation Management</label>

                                        </div>

                                        <div class="form-check form-check-inline interest-area-check">

                                            <input class="form-check-input checkbox-input" type="checkbox" id="inlineCheckbox2" value="unchecked">

                                            <label class="form-check-label" for="inlineCheckbox2">Public Relations</label>

                                        </div>

                                        <div class="form-check form-check-inline interest-area-check">

                                            <input class="form-check-input checkbox-input" type="checkbox" id="inlineCheckbox2" value="unchecked">

                                            <label class="form-check-label" for="inlineCheckbox2">Financial Analyst</label>

                                        </div>

                                        <div class="form-check form-check-inline interest-area-check">

                                            <input class="form-check-input checkbox-input" type="checkbox" id="inlineCheckbox2" value="unchecked">

                                            <label class="form-check-label" for="inlineCheckbox2">Insurance</label>

                                        </div>
                                        </div>

                                        <div class="d-flex">

                                        <div class="form-check form-check-inline interest-area-check">

                                            <input class="form-check-input checkbox-input" type="checkbox" id="inlineCheckbox2" value="unchecked">

                                            <label class="form-check-label" for="inlineCheckbox2">Advertising</label>

                                        </div>

                                        <div class="form-check form-check-inline interest-area-check">

                                            <input class="form-check-input checkbox-input" type="checkbox" id="inlineCheckbox2" value="unchecked">

                                            <label class="form-check-label" for="inlineCheckbox2">Sales</label>

                                        </div>

                                        <div class="form-check form-check-inline interest-area-check">

                                            <input class="form-check-input checkbox-input" type="checkbox" id="inlineCheckbox2" value="unchecked">

                                            <label class="form-check-label" for="inlineCheckbox2">Paralegal</label>

                                        </div>

                                        <div class="form-check form-check-inline interest-area-check">

                                            <input class="form-check-input checkbox-input" type="checkbox" id="inlineCheckbox2" value="unchecked">

                                            <label class="form-check-label" for="inlineCheckbox2">Credit Analysis/Loans</label>

                                        </div>
                                        </div>

                                        <div class="d-flex">

                                        <div class="form-check form-check-inline interest-area-check">

                                            <input class="form-check-input checkbox-input" type="checkbox" id="inlineCheckbox2" value="unchecked">

                                            <label class="form-check-label" for="inlineCheckbox2">Political Science</label>

                                        </div>

                                        <div class="form-check form-check-inline interest-area-check">

                                            <input class="form-check-input checkbox-input" type="checkbox" id="inlineCheckbox2" value="unchecked">

                                            <label class="form-check-label" for="inlineCheckbox2">HR</label>

                                        </div>

                                        <div class="form-check form-check-inline interest-area-check">

                                            <input class="form-check-input checkbox-input" type="checkbox" id="inlineCheckbox2" value="unchecked">

                                            <label class="form-check-label" for="inlineCheckbox2">Financial Service Sector</label>

                                        </div>

                                        <div class="form-check form-check-inline interest-area-check">

                                            <input class="form-check-input checkbox-input" type="checkbox" id="inlineCheckbox2" value="unchecked">

                                            <label class="form-check-label" for="inlineCheckbox2">Project Management</label>

                                        </div>
                                        </div>

                                        <div class="d-flex">

                                        <div class="form-check form-check-inline interest-area-check">

                                            <input class="form-check-input checkbox-input" type="checkbox" id="inlineCheckbox2" value="unchecked">

                                            <label class="form-check-label" for="inlineCheckbox2">Program Management</label>

                                        </div>

                                        <div class="form-check form-check-inline interest-area-check">

                                            <input class="form-check-input checkbox-input" type="checkbox" id="inlineCheckbox2" value="unchecked">

                                            <label class="form-check-label" for="inlineCheckbox2">Construction</label>

                                        </div>

                                        <div class="form-check form-check-inline interest-area-check">

                                            <input class="form-check-input checkbox-input" type="checkbox" id="inlineCheckbox2" value="unchecked">

                                            <label class="form-check-label" for="inlineCheckbox2">Fashoin Design</label>

                                        </div>

                                        <div class="form-check form-check-inline interest-area-check">

                                            <input class="form-check-input checkbox-input" type="checkbox" id="inlineCheckbox2" value="unchecked">

                                            <label class="form-check-label" for="inlineCheckbox2">Civil Engineer</label>

                                        </div>
                                        </div>

                                        <div class="d-flex">

                                        <div class="form-check form-check-inline interest-area-check">

                                            <input class="form-check-input checkbox-input" type="checkbox" id="inlineCheckbox2" value="unchecked">

                                            <label class="form-check-label" for="inlineCheckbox2">Teacher/Education</label>

                                        </div>

                                        <div class="form-check form-check-inline interest-area-check">

                                            <input class="form-check-input checkbox-input" type="checkbox" id="inlineCheckbox2" value="unchecked">

                                            <label class="form-check-label" for="inlineCheckbox2">School Councilor/Administration</label>

                                        </div>

                                        <div class="form-check form-check-inline interest-area-check">

                                            <input class="form-check-input checkbox-input" type="checkbox" id="inlineCheckbox2" value="unchecked">

                                            <label class="form-check-label" for="inlineCheckbox2">Agriculture/Aquaculture</label>

                                        </div>

                                        <div class="form-check form-check-inline interest-area-check">

                                            <input class="form-check-input checkbox-input" type="checkbox" id="inlineCheckbox2" value="unchecked">

                                            <label class="form-check-label" for="inlineCheckbox2">Communications</label>

                                        </div>
                                        </div>

                                        <div class="d-flex">

                                        <div class="form-check form-check-inline interest-area-check">

                                            <input class="form-check-input checkbox-input" type="checkbox" id="inlineCheckbox2" value="unchecked">

                                            <label class="form-check-label" for="inlineCheckbox2">Sports Management</label>

                                        </div>

                                        <div class="form-check form-check-inline interest-area-check">

                                            <input class="form-check-input checkbox-input" type="checkbox" id="inlineCheckbox2" value="unchecked">

                                            <label class="form-check-label" for="inlineCheckbox2">Computer Systems Analyst </label>

                                        </div>

                                        <div class="form-check form-check-inline interest-area-check">

                                            <input class="form-check-input checkbox-input" type="checkbox" id="inlineCheckbox2" value="unchecked">

                                            <label class="form-check-label" for="inlineCheckbox2">Green Energy</label>

                                        </div>

                                        <div class="form-check form-check-inline interest-area-check">

                                            <input class="form-check-input checkbox-input" type="checkbox" id="inlineCheckbox2" value="unchecked">

                                            <label class="form-check-label" for="inlineCheckbox2">Electrician</label>

                                        </div>
                                        </div>

                                        <div class="d-flex">

                                        <div class="form-check form-check-inline interest-area-check">

                                            <input class="form-check-input checkbox-input" type="checkbox" id="inlineCheckbox2" value="unchecked">

                                            <label class="form-check-label" for="inlineCheckbox2">Hotel/Restaurant</label>

                                        </div>

                                        <div class="form-check form-check-inline interest-area-check">

                                            <input class="form-check-input checkbox-input" type="checkbox" id="inlineCheckbox2" value="unchecked">

                                            <label class="form-check-label" for="inlineCheckbox2">Mechanical Engineer </label>

                                        </div>

                                        <div class="form-check form-check-inline interest-area-check">

                                            <input class="form-check-input checkbox-input" type="checkbox" id="inlineCheckbox2" value="unchecked">

                                            <label class="form-check-label" for="inlineCheckbox2">Petroleum Engineer</label>

                                        </div>

                                        <div class="form-check form-check-inline interest-area-check">

                                            <input class="form-check-input checkbox-input" type="checkbox" id="inlineCheckbox2" value="unchecked">

                                            <label class="form-check-label" for="inlineCheckbox2">Entrepreneur</label>

                                        </div>
                                        </div>


                                        <div class="d-flex">

                                        <div class="form-check form-check-inline interest-area-check">

                                            <input class="form-check-input checkbox-input" type="checkbox" id="inlineCheckbox2" value="unchecked">

                                            <label class="form-check-label" for="inlineCheckbox2">Sales/Sales Management</label>

                                        </div>

                                        <div class="form-check form-check-inline interest-area-check">

                                            <input class="form-check-input checkbox-input" type="checkbox" id="inlineCheckbox2" value="unchecked">

                                            <label class="form-check-label" for="inlineCheckbox2">Recreation </label>

                                        </div>

                                        <div class="form-check form-check-inline interest-area-check">

                                            <input class="form-check-input checkbox-input" type="checkbox" id="inlineCheckbox2" value="unchecked">

                                            <label class="form-check-label" for="inlineCheckbox2">Aviation</label>

                                        </div>

                                        <div class="form-check form-check-inline interest-area-check">

                                            <input class="form-check-input checkbox-input" type="checkbox" id="inlineCheckbox2" value="unchecked">

                                            <label class="form-check-label" for="inlineCheckbox2">Actor</label>

                                        </div>
                                        </div>


                                        <div class="d-flex">

                                        <div class="form-check form-check-inline interest-area-check">

                                            <input class="form-check-input checkbox-input" type="checkbox" id="inlineCheckbox2" value="unchecked">

                                            <label class="form-check-label" for="inlineCheckbox2">Pilot</label>

                                        </div>

                                        <div class="form-check form-check-inline interest-area-check">

                                            <input class="form-check-input checkbox-input" type="checkbox" id="inlineCheckbox2" value="unchecked">

                                            <label class="form-check-label" for="inlineCheckbox2">Executive Only</label>

                                        </div>


                                        </div>
                                        </div>



                                    </div>



                                    <div class="col-12 text-center mt-2 pt-50">

                                        <button type="submit" class="btn btn-primary me-1 add-button">Save</button>

                                    </div>

                                </form>

                            </div>

                        </div>

                    </div>

                </div>

            </section>







        </div>

    </div>



    <!-- END: Content-->





@endsection



@section('styles')





    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/backend/vendors/css/tables/datatable/dataTables.bootstrap5.min.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/backend/vendors/css/tables/datatable/responsive.bootstrap5.min.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/backend/vendors/css/tables/datatable/buttons.bootstrap5.min.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/backend/vendors/css/tables/datatable/rowGroup.bootstrap5.min.css">







    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/backend/css/pages/modal-create-app.css">



@endsection



@section('scripts')



    <!-- BEGIN: Page Vendor JS-->

    <script src="{{ asset('/')}}assets/backend/vendors/js/forms/select/select2.full.min.js"></script>

    <script src="{{ asset('/')}}assets/backend/vendors/js/tables/datatable/jquery.dataTables.min.js"></script>

    <script src="{{ asset('/')}}assets/backend/vendors/js/tables/datatable/dataTables.bootstrap5.min.js"></script>

    <script src="{{ asset('/')}}assets/backend/vendors/js/tables/datatable/dataTables.responsive.min.js"></script>

    <script src="{{ asset('/')}}assets/backend/vendors/js/tables/datatable/responsive.bootstrap5.js"></script>

    <script src="{{ asset('/')}}assets/backend/vendors/js/tables/datatable/datatables.buttons.min.js"></script>





@endsection
