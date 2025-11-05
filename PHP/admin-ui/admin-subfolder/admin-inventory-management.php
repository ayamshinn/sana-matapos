<!----------------Inventory Section------------------------------->
<section id="admin-inventory" class="inventory-container">
    <hr class="hr" style="color: #9E5B08;">
    <div class="inventory">
        <div class="wrapper d-flex flex-wrap">
            <div class="profile-container ">
                <div class="header-text d-flex flex-row mb-2">
                    <i class="fa-solid fa-boxes-stacked"></i>
                    <h3>Inventory</h3>
                </div>
                <div class="description-header-text">
                    <p>Know what’s available, what’s low, and what’s expiring soon.</p>
                </div>
            </div>
        </div>

        <div class="overview-container">
            <div class="overview-section-title">
                <h3>Overview</h3>
            </div>
            <div
                class="row row-cols-xxl-3 row-cols-lg-3 row-cols-md-1 row-cols-sm-1 d-flex justify-content-center p-1 ">
                <div class="col-xxl-4 cols-lg-4 cols-md-12 cols-sm-12">
                    <div class="overview-wrapper d-flex flex-row align-items-center">
                        <div class="overview-wrapper-i bg-success">
                            <ion-icon name="trending-up-outline"></ion-icon>
                        </div>
                        <div class="overview-wrapper-p">
                            <h3><span id="available-stock">Stock Status: High</span></h3>
                            <p id="avalable-stock-number">100</span></p>
                            <p>Items</p>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-4 cols-lg-4 cols-md-12 cols-sm-12">
                    <div class="overview-wrapper d-flex flex-row align-items-center">
                        <div class="overview-wrapper-i bg-warning">
                            <ion-icon name="trending-down-outline"></ion-icon>
                        </div>
                        <div class="overview-wrapper-p">
                            <h3><span id="low-on-stock">Stock Level: Below 50%</span></h3>
                            <p id="low-on-stock-number">35</p>
                            <p>Items</p>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-4 cols-lg-4 cols-md-12 cols-sm-12">
                    <div class="overview-wrapper d-flex flex-row align-items-center">
                        <div class="overview-wrapper-i bg-secondary">
                            <ion-icon name="hourglass-outline"></ion-icon>
                        </div>
                        <div class="overview-wrapper-p">
                            <h3><span id="No-stock">Expiring Soon</span></h3>
                            <p id="no-stock-number">0</p>
                            <p>Items</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="inventory-wrapper-container mt-5 border pt-2">
            <div class="container-tools px-3">
                <div
                    class="container-tool-wrapper d-flex justify-content-space-between align-items-center gap-3 flex-wrap">


                    <div class="monthly-wrapper-caret-down">
                        <button type="button" class="inventory-management-caret-button"
                            id="inventory-management-caret-btn" title="Weekly Report" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <span class="selected-period">Select Period</span>
                            <i class="fa-solid fa-caret-down"></i>
                        </button>

                        <ul class="monthly-dropdown" id="inventory-dropdown-id">
                            <li><a class="monthly-dropdown-item" href="#">Weekly</a></li>
                            <li><a class="monthly-dropdown-item" href="#">Monthly</a></li>
                            <li><a class="monthly-dropdown-item" href="#">Yearly</a></li>
                        </ul>
                    </div>



                    <div class="search-wrapper-inventory">
                        <input type="text" name="inventory-searchbar" class="inventory-searchbar form-control"
                            placeholder="Search">
                        <i class="fas fa-search"></i>
                    </div>

                    <div class="add-inventory-btn-container">
                        <button class="add-inventory-btn"><i class="fa-solid fa-user-plus"
                                data-target="add-stock-modal-container-id"> </i> Add Stock</button>
                    </div>
                </div>
            </div>

            <hr class="mt-2 mb-4" style="color: #9E5B08;">

            <div class="inventory-current-stock px-3">
                <h3>Current Stock</h3>
                <div class="inventory-current-stock-p">
                    <p>Stay informed with the latest stock levels.</p>
                </div>
            </div>
            <div class="inventory-table-container px-3 pt-2 pb-5">
                <div class="inventory-table-wrapper h-100 w-100">
                    <table class="table inventory-table mb-0" id="Inventory-table">
                        <thead>
                            <tr>
                                <th>Item ID </th>
                                <th>Item Name</th>
                                <th>Item Type</th>
                                <th>Quantity/Volume</th>
                                <th>Unit </th>
                                <th>Remaining</th>
                                <th>Stock Status</th>
                                <th>Expiration Date</th>
                                <th>Expiry Status</th>                            
                            </tr>
                        </thead>
                        <tbody id="inventory-body">
                            
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="inventory-usage-title px-3">
                <h3>Usage Summary</h3>
                <div class="inventory-usage-p">
                    <p>See which items are being used.</p>
                </div>
            </div>
            <div class="inventory-table-usage-container px-3 pt-2 pb-5">
                <div class="inventory-table-usage-wrapper h-100 w-100">
                    <table class="inventory-usage-summary mb-0" id="inventory-usage-summary-id">
                        <thead>
                            <tr>
                                <th>Category</th>
                                <th>Subcategory</th>
                                <th>Patient Name</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Used</th>
                                <th>Dentist</th>
                            </tr>
                        </thead>
                        <tbody id="inventory-usage-summary-tbody">
                            <tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="add-stock-modal-container" id="add-stock-modal-container-id">
    <div class="add-stock-modal-wrapper">
        <div class="add-stock-button-close">
            <button class="add-stock-button-id">&times;</button>
        </div>
        <div class="add-stock-title mt-2">
            <h3>Add Stock</h3>
            <div class="add-stock-title-p">
                <p>Running out of stock? Add what's running low. </p>
            </div>
        </div>

        <div class="add-new-stock-container mt-3">
            <div class="row row-cols-xxl-2 row-cols-xl-2 row-cols-lg-1 row-cols-md-1 row-cols-sm-1 row-cols-1">
                <div class="col-xxl-6 col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="add-new-stock-wrapper">
                        <div class="form-floating">
                            <input type="text" id="ItemName" class="form-control" name="ItemName"
                                placeholder="Item Name" required>
                            <label for="ItemName">Item Name<span class="required">*</span></label>
                        </div>
                    </div>
                </div>

                <div class="col-xxl-6 col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="add-new-stock-wrapper">
                        <div class="form-floating">
                            <input type="text" id="ItemID" class="form-control" name="ItemID" placeholder="Item ID"
                                required>
                            <label for="ItemID">Item ID<span class="required">*</span></label>
                        </div>
                    </div>
                </div>

                <div class="col-xxl-6 col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="add-new-stock-wrapper">
                        <div class="form-floating">
                            <input type="text" id="ItemQuantity" class="form-control" name="ItemQuantity"
                                placeholder="Quantity" required>
                            <label for="ItemQuantity">Quantity<span class="required">*</span></label>
                        </div>
                    </div>
                </div>

                <div class="col-xxl-6 col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="add-new-stock-wrapper">
                        <div class="form-floating">
                            <input type="text" id="ItemUnit" class="form-control" name="ItemUnit" placeholder="Unit"
                                required>
                            <label for="ItemUnit">Unit<span class="required">*</span></label>
                        </div>
                    </div>
                </div>

                <div class="col-xxl-6 col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="add-new-stock-wrapper">
                        <div class="form-floating">
                            <input type="date" id="Purchase" class="form-control" name="Purchase" placeholder="Purchase"
                                required>
                            <label for="Purchase">Purchase<span class="required">*</span></label>
                        </div>
                    </div>
                </div>

                <div class="col-xxl-6 col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="add-new-stock-wrapper">
                        <div class="form-floating">
                            <input type="date" id="ExpiryDate" class="form-control" name="ExpiryDate"
                                placeholder="Expiry Date" required>
                            <label for="ExpiryDate">Expiry Date<span class="required">*</span></label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="add-stock-button-container ms-auto mt-2">
                <div class="add-stock-button">
                    <button class="add-stock-btn ms-auto bg-success" type="submit" name="add-stock">Add Stock</button>
                    <div class="cancel-button">
                        <button class="add-stock-button-id bg-danger">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="toast" class="toast"></div>
</div> 

