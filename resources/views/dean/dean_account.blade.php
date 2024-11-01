@extends('layouts.dean_layout')

@section('title', 'Memorandum' )

@section('custom-css')
    <link rel="stylesheet" href="{{ asset ('css/dean/dean_account.css') }}">
@endsection

@section('main-id','dashboard-content')

@section('content') 
    <section class="title">
        <div class="title-content">
            <h3>My Profile</h3>
        </div>
    </section>

            <div class="account-profile">
                <div class="profile-header">
                    <img src="{{ asset ('images/cover-photo.png') }}" alt="header_image" class="header-image">
                </div>
                <div class="profile-container">
                    <div class="profile-picture">
                        <img src="{{ asset ('images/boy-1.png') }}" alt="Profile Picture">
                    </div>
                    <div class="profile-details">
                        <h2>Kent Ar-Jay B. Dela Peña</h2>
                        <div class="profile-info">
                            <span class="employee-id">2021-4348-78983</span>
                            <span class="position">Administrative Officer</span>
                        </div>
                    </div>
                    <div class="edit-button">
                        <button id="openModalBtn">
                            <i class="bi bi-pencil-square"></i>
                        </button>
                    </div>
                </div>
            </div>
            
            <div class="info-details">
                <h2>Personal Information</h2>
                <div class="info-row">
                    <span class="label">Last Name</span>
                    <span class="value" data-field="lastname">Dela Pena</span>
                </div>
                <div class="info-row">
                    <span class="label">First Name:</span>
                    <span class="value" data-field="firstname">Kent</span>
                </div>
                <div class="info-row">
                    <span class="label">Middle Name</span>
                    <span class="value" data-field="middlename">Bandojo</span>
                </div>
                <div class="info-row">
                    <span class="label">Office:</span>
                    <span class="value" data-field="office">Administrative Services Division Office</span>
                </div>
                <div class="info-row">
                    <div class="label">Age:</div>
                    <div class="value" data-field="age">25</div>
                </div>
                <div class="info-row">
                    <span class="label">Sex:</span>
                    <span class="value" data-field="sex">Male</span>
                </div>
                <div class="info-row">
                    <span class="label">Email:</span>
                    <span class="value" data-field="email">kentarjaybandojo.delapena@bicol-u.edu.ph</span>
                </div>
                <div class="info-row">
                    <span class="label">Phone Number:</span>
                    <span class="value" data-field="phone">09816635890</span>
                </div>
                <div class="info-row">
                    <div class="label">Address:</div>
                    <div class="value" data-field="address">Purok-2, Santo Niño, Santo Domingo</div>
                </div>
            </div>

            <div id="myModal" class="modal">
                <div class="modal-content">
                    <span class="close">&times;</span>
                    <h2>Update Profile</h2>
                    <form id="updateProfileForm">
                        <div class="form-row">
                            <div class="form-group">
                                <label for="lastname">Last Name</label>
                                <input type="text" id="lastname" name="lastname" value="Dela Pena" data-field="lastname" required>


                            </div>
                            <div class="form-group">
                                <label for="firstname">First Name</label>
                                <input type="text" id="firstname" name="firstname" value="Kent" data-field="firstname" required>
                            </div>
                            <div class="form-group">
                                <label for="middlename">Middle Name</label>
                                <input type="text" id="middlename" name="middlename" value="Bandojo" data-field="middlename" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="office">Office</label>
                                <input type="text" id="office" name="office" value="Administrative Services Division Office" data-field="office" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <!-- Example Age Input Field -->
                            <div class="form-group">
                                <label for="age">Age:</label>
                                <input type="number" id="age" name="age" data-field="age" min="0" max="120" step="1" required>
                                <div class="invalid-feedback">Age cannot be set in the future.</div>
                            </div>

                            <div class="form-group">
                                <label for="sex">Sex</label>
                                <input type="text" id="sex" name="sex" value="Male" data-field="sex" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" id="email" name="email" value="kentarjaybandojo.delapena@bicol-u.edu.ph" data-field="email" required>
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone Number</label>
                                <input type="text" id="phone" name="phone" value="09816635890" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="street">Street:</label>
                                <input type="text" id="street" name="street" data-field="street" required>
                            </div>
                            <div class="form-group">
                                <label for="barangay">Barangay</label>
                                <input type="text" id="barangay" name="barangay" data-field="barangay" required>
                            </div>
                            <div class="form-group">
                                <label for="city">City</label>
                                <input type="text" id="city" name="city" data-field="city" required>
                            </div>
                            <div class="form-group">
                                <label for="province">Province:</label>
                                <input type="text" id="province" name="province" data-field="province" required>
                            </div>
                        </div>
                        <div class="form-buttons">
                            <button type="button" id="closeModalBtn">Cancel</button>
                            <button type="button" id="saveChangesBtn">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Warning Modal -->
            <div id="warningModal" class="modal">
                <div class="modal-content">
                    <span id="warningCloseBtn" class="close">&times;</span>
                    <h2>Warnings</h2>
                    <div id="warningContent"></div>
                    <button id="warningCloseBtn">Close</button>
                </div>
            </div>
@endsection


@section('custom-js')
    <script src="{{ asset('js/dean/dean_account.js') }}"></script>
@endsection

</body>
</html>