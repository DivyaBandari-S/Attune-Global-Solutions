<div>
    <style>
    body {
        font-family: 'Roboto', sans-serif;
    }

    .container {
        margin-top: 20px;
        padding: 10px 15px;
        ;
        background: #fcfcfc;
    }

    .calender {
        margin-top: 40px;
        display: flex;
        flex-direction: row;
        align-items: center;
        background: #fcfcfc;
        margin-left: 68%;
        border: 1px solid #ccc;
        padding: 5px;
        width: 32%;
        border-radius: 10px;
    }

    .main-cont {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        padding: 10px 15px;
        align-items: baseline;
        height: 40vh;
        background: #d0d3de;
    }

    .text p {
        font-size: 0.875rem;
    }

    .text h6 {
        font-weight: 600;
        color: #003767;
    }

    .btn {
        background: #003767;
        border: 1px solid #003767;
        font-size: 0.875rem;
        font-weight: 500;
        color: #fff;
        width: 100px;
        padding: 2px;
    }

    .btn:hover {
        background: #fff;
        border: 1px solid #003767;
        font-size: 0.875rem;
        font-weight: 500;
        color: #003767;
        width: 100px;
    }

    .view-container {
        /* display: flex; */
        padding: 0;
        position: relative;
        top: -4rem
    }

    .view {
        border: 1px solid #cccccc;
        border-radius: 7px;
        background: #fcfcfc;
        /* position: relative; */
        padding: 7px 10px;
        transition: all 0.3s ease-in-out;
        cursor: pointer;
    }
    .view:hover{
     margin-top:-5px;
    }

    .view h6 {
        font-size: 0.9rem;
        font-weight: 600;
        color: #003767;
    }

    .vendor-icon {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        align-items: center;
    }

    .vendor-icon {
        font-weight: 600;
    }

    .vendor-icon p {
        font-size: 0.875rem;
        color: #002555;
    }

    .vendors {
        background: #fff;
        color: #004c8e;
        border: 1px solid #002555;
        border-radius: 4px;
        font-size: 0.725rem;
        font-weight: 600;
        width: 50px;
    }

    .pink-background {
        position: absolute;
        top: 0;
        color: #fff;
        align-items: center;
        border-top-left-radius: 5px;
        border-bottom-left-radius: 5px;
        left: 0;
        height: 100%;
        background-color: #003767;
        padding: 3px;
    }

    @media only screen and (max-width: 768px) {
        .view-container {
            display: block;
            top: -0.5rem;
        }
    }
    </style>

    <div>
        <div class="main-cont">
            <div class="text mt-4">
                <h6>Welcome Bandari Divya, your dashboard is ready!</h6>
                <p>Great Job, your affiliate dashboard is ready to go!You can view profiles,vendors,customers and
                    purchase orders.</p>
                <button class="btn">View Profile</button>
            </div>
            <!-- <div class="image">
        <img src="https://img.freepik.com/free-vector/modern-business-team-working-open-office-space_74855-5541.jpg" alt="" style="width:300px;height:200px;">
      </div> -->
        </div>
        <!-- row containers -->
        <div class="view-container row container-fluid">
            <div style="padding: 5px;" class="col-md-4">
                <div class="view" style="display:flex;justify-content: center;align-items: center;">
                    <!-- <div> -->
                    <div style="margin-left:16px; margin-top:16px">
                        <img src="{{asset('/images/user.png')}}" style="width:35%;" />
                        <p style="font-size:12px; font-weight:400; margin-bottom:0px">Customers</p>
                        <div class="vendor-icon">
                            <p style="font-size:40px; margin-bottom:0px">10</p>
                        </div>
                        <button class="vendors">View</button>
                    </div>

                    <div class="vendor-icon">
                        <img src="{{asset('/images/customer-img.png')}}" />
                    </div>
                    <!-- </div> -->

                </div>
            </div>
            <div style="padding: 5px;" class="col-md-4">
                <div class="view" style="display:flex;justify-content: center;align-items: center;">
                    <!-- <div> -->
                    <div style="margin-left:16px; margin-top:16px;">
                        <img src="{{asset('/images/money.png')}}" style="width:50%;" />
                        <p style="font-size:12px; font-weight:400; margin-bottom:0px">Vendors</p>
                        <div class="vendor-icon">
                            <p style="font-size:40px; margin-bottom:0px">10</p>
                        </div>
                        <button class="vendors">View</button>
                    </div>

                    <div class="vendor-icon">
                        <img src="{{asset('/images/vendors.png')}}" />
                    </div>
                    <!-- </div> -->

                </div>
            </div>
            <div style="padding: 5px;" class="col-md-4">
                <div class="view" style="display:flex;justify-content: center;align-items: center;">
                    <!-- <div> -->
                    <div style="margin-left:16px; margin-top:16px;">
                        <img src="{{asset('/images/manager.png')}}" style="width:50%;" />
                        <p style="font-size:12px; font-weight:400; margin-bottom:0px">Employees</p>
                        <div class="vendor-icon">
                            <p style="font-size:40px; margin-bottom:0px">10</p>
                        </div>
                        <button class="vendors">View</button>
                    </div>

                    <div class="vendor-icon">
                        <img src="{{asset('/images/employee.png')}}" />
                    </div>
                    <!-- </div> -->

                </div>
            </div>
            <div style="padding: 5px;" class="col-md-4">
            <div class="view" style="display:flex;justify-content: center;align-items: center;">
                    <!-- <div> -->
                    <div style="margin-left:16px; margin-top:16px;">
                        <img src="{{asset('/images/contractor.png')}}" style="width:50%;" />
                        <p style="font-size:12px; font-weight:400; margin-bottom:0px">Contractors</p>
                        <div class="vendor-icon">
                            <p style="font-size:40px; margin-bottom:0px">20</p>
                        </div>
                        <button class="vendors">View</button>
                    </div>

                    <div class="vendor-icon">
                        <img src="{{asset('/images/contractor-img.png')}}" />
                    </div>
                    <!-- </div> -->

                </div>
            </div>
            <!-- <Invoice> -->
            <div style="padding: 5px;" class="col-md-4">
            <div class="view" style="display:flex;justify-content: center;align-items: center;">
                    <!-- <div> -->
                    <div style="margin-left:16px; margin-top:16px;">
                        <img src="{{asset('/images/Freepick.png')}}" style="width:50%;" />
                        <p style="font-size:12px; font-weight:400; margin-bottom:0px">Invoice</p>
                        <div class="vendor-icon">
                            <p style="font-size:40px; margin-bottom:0px">20</p>
                        </div>
                        <button class="vendors">View</button>
                    </div>

                    <div class="vendor-icon">
                        <img src="{{asset('/images/Search-cuate.png')}}" />
                    </div>
                    <!-- </div> -->

                </div>
            </div>
            <!-- <Total-Bills> -->
            <div style="padding: 5px;" class="col-md-4">
            <div class="view" style="display:flex;justify-content: center;align-items: center;">
                    <!-- <div> -->
                    <div style="margin-left:16px; margin-top:16px;">
                        <img src="{{asset('/images/invoice.png')}}" style="width:50%;" />
                        <p style="font-size:12px; font-weight:400; margin-bottom:0px">Total Bills</p>
                        <div class="vendor-icon">
                            <p style="font-size:40px; margin-bottom:0px">20</p>
                        </div>
                        <button class="vendors">View</button>
                    </div>

                    <div class="vendor-icon">
                        <img src="{{asset('/images/Strategic consulting-cuate.png')}}" />
                    </div>
                    <!-- </div> -->

                </div>
            </div>
        </div>
    </div>
</div>