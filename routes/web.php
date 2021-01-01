<?php
/*Route::get('/', function () {
return redirect()->route('login');
});
//Route::get('profile',function(){only verified users may enter...}) ->middleware('verified');
 */

//Frontend Routes......

Route::get('/', function () {
    return view('welcome');
});
Route::post('/contact-information', 'ContactController@contact_information');
Route::get('/all-login', 'AuthController@login');
Route::get('/all-register', 'AuthController@register');

Auth::routes(['verify' => true]);

Route::group(['middleware' => 'verified'], function () {

    Route::get('/home', 'HomeController@index')->name('home');

//product routes here----

    Route::get('/add-product', 'ProductController@AddProduct')->name('add.product')->middleware('cashier');
    Route::post('/insert-product', 'ProductController@InsertProduct')->middleware('cashier');
    Route::get('/all-product', 'ProductController@AllProduct')->name('all.product')->middleware('cashier');
    Route::get('/view-product/{id}', 'ProductController@ViewProduct')->middleware('cashier');
    Route::get('/delete-product/{id}', 'ProductController@DeleteProduct')->middleware('cashier');
    Route::get('/edit-product/{id}', 'ProductController@EditProduct')->middleware('cashier');
    Route::post('/update-product/{id}', 'ProductController@UpdateProduct')->middleware('cashier');
    Route::post('/update-stock/{id}', 'ProductController@UpdateStock')->middleware('cashier');
    Route::post('/update-price/{id}', 'ProductController@UpdatePrice')->middleware('cashier');
    Route::get('/import-product', 'ProductController@ImportProduct')->name('import.product')->middleware('cashier');
    Route::post('/import', 'ProductController@import')->name('import')->middleware('cashier');
    Route::get('/export', 'ProductController@export')->name('export')->middleware('cashier');

//suppliers routes are here----

    Route::get('/add-supplier', 'SupplierController@index')->name('add.supplier')->middleware('cashier');
    Route::post('/insert-supplier', 'SupplierController@InsertSupplier')->middleware('cashier');
    Route::get('/all-supplier', 'SupplierController@AllSupplier')->name('all.supplier')->middleware('cashier');
    Route::get('/view-supplier/{id}', 'SupplierController@ViewSupplier')->middleware('cashier');
    Route::get('/delete-supplier/{id}', 'SupplierController@DeleteSupplier')->middleware('cashier');
    Route::get('/edit-supplier/{id}', 'SupplierController@EditSupplier')->middleware('cashier');
    Route::post('/update-supplier/{id}', 'SupplierController@UpdateSupplier')->middleware('cashier');

//category routes here----

    Route::get('/add-category', 'CategoryController@AddCategory')->name('add.category')->middleware('cashier');
    Route::post('/insert-category', 'CategoryController@InsertCategory')->middleware('cashier');
    Route::get('/all-category', 'CategoryController@AllCategory')->name('all.category')->middleware('cashier');
    Route::get('/delete-category/{id}', 'CategoryController@DeleteCategory')->middleware('cashier');
    Route::get('/edit-category/{id}', 'CategoryController@EditCategory')->middleware('cashier');
    Route::post('/update-category/{id}', 'CategoryController@UpdateCategory')->middleware('cashier');

//customer routes are here----

    Route::get('/add-customer', 'CustomerController@index')->name('add.customer');
    Route::post('/insert-customer', 'CustomerController@InsertCustomer');
    Route::post('/save-customer', 'CustomerController@SaveCustomer');
    Route::get('/all-customer', 'CustomerController@AllCustomer')->name('all.customer');
    Route::get('/view-customer/{id}', 'CustomerController@ViewCustomer')->middleware('cashier');
    Route::get('/delete-customer/{id}', 'CustomerController@DeleteCustomer')->middleware('cashier');
    Route::get('/edit-customer/{id}', 'CustomerController@EditCustomer')->middleware('cashier');
    Route::post('/update-customer/{id}', 'CustomerController@UpdateCustomer')->middleware('cashier');

//POS routes are here----

    Route::get('/point-of-sales', 'PosController@index')->name('pos');

//cart routes are here----

    Route::post('/add-cart', 'CartController@AddCart');
    Route::post('/update-cart/{rowId}', 'CartController@UpdateCart');
    Route::get('/remove-cart/{rowId}', 'CartController@RemoveCart');
    Route::get('/select-customer', 'CartController@SelectCustomer');
    Route::get('/create-invoice/{id}', 'CartController@CreateInvoice');
    Route::post('/final-invoice', 'CartController@FinalInvoice');

//VAT routes are here----

    Route::get('/add-vat', 'VatController@AddVat')->middleware('manager');
    Route::post('/insert-vat', 'VatController@InsertVat')->middleware('manager');
    Route::get('/view-vat', 'VatController@ViewVat')->middleware('manager');
    Route::post('/update-vat/{id}', 'VatController@UpdateVat')->middleware('manager');

//order routes are here----

    Route::get('/pending-orders', 'OrderController@PendingOrders')->name('pending.orders')->middleware('cashier');
    Route::get('/view-order-status/{id}', 'OrderController@ViewOrder')->middleware('cashier');
    Route::get('/confirm-order/{id}', 'OrderController@ConfirmOrder')->middleware('cashier');
    Route::get('/successful-orders', 'OrderController@SuccessfulOrders')->name('successful.orders')->middleware('cashier');
    Route::get('/view-successful-order-status/{id}', 'OrderController@ViewSuccessfulOrder')->middleware('cashier');

//employee routes are here----

    Route::get('/all-employee', 'EmployeeController@AllEmployee')->middleware('manager');
    Route::get('/add-employee-information/{id}', 'EmployeeController@AddEmployee')->middleware('manager');
    Route::post('/insert-employee-information/{id}', 'EmployeeController@InsertEmployee')->middleware('manager');
    Route::get('/view-employee/{id}', 'EmployeeController@ViewEmployee')->middleware('manager');
    Route::get('/edit-info/{id}', 'EmployeeController@EditInfo')->middleware('manager');
    Route::post('/update-info/{id}', 'EmployeeController@UpdateInfo')->middleware('manager');
    Route::get('/edit-employee/{id}', 'EmployeeController@EditEmployee')->middleware('manager');
    Route::post('/update-employee/{id}', 'EmployeeController@UpdateEmployee')->middleware('manager');
    Route::get('/delete-employee/{id}', 'EmployeeController@DeleteEmployee')->middleware('manager');

//contact routes are here----

    Route::get('/all-contact', 'ContactController@all_contact')->middleware('manager');
    Route::get('/view-contact/{id}', 'ContactController@view_contact')->middleware('manager');
    Route::get('/delete-contact/{id}', 'ContactController@delete_contact')->middleware('manager');

//profile routes are here----

    Route::get('/view-profile/{id}', 'EmployeeController@view_profile');
    Route::get('/update-profile/{id}', 'EmployeeController@update_profile');
    Route::post('/save-profile/{id}', 'EmployeeController@save_profile');

//expense routes are here----

    Route::get('/add-expense', 'ExpenseController@AddExpense')->name('add.expense')->middleware('manager');
    Route::post('/insert-expense', 'ExpenseController@InsertExpense')->middleware('manager');
    Route::get('/today-expense', 'ExpenseController@TodayExpense')->name('today.expense')->middleware('manager');
    Route::get('/delete-today-expense/{id}', 'ExpenseController@DeleteTodayExpense')->middleware('manager');
    Route::get('/edit-today-expense/{id}', 'ExpenseController@EditTodayExpense')->middleware('manager');
    Route::post('/update-expense/{id}', 'ExpenseController@UpdateTodayExpense')->middleware('manager');
    Route::get('/monthly-expense', 'ExpenseController@MonthlyExpense')->name('monthly.expense')->middleware('manager');
    Route::get('/yearly-expense', 'ExpenseController@YearlyExpense')->name('yearly.expense')->middleware('manager');

//monthly expenses routes are here----

    Route::get('/january-expense', 'ExpenseController@JanuaryExpense')->name('january.expense')->middleware('manager');
    Route::get('/february-expense', 'ExpenseController@FebruaryExpense')->name('february.expense')->middleware('manager');
    Route::get('/march-expense', 'ExpenseController@MarchExpense')->name('march.expense')->middleware('manager');
    Route::get('/april-expense', 'ExpenseController@AprilExpense')->name('april.expense')->middleware('manager');
    Route::get('/may-expense', 'ExpenseController@MayExpense')->name('may.expense')->middleware('manager');
    Route::get('/june-expense', 'ExpenseController@JuneExpense')->name('june.expense')->middleware('manager');
    Route::get('/july-expense', 'ExpenseController@JulyExpense')->name('july.expense')->middleware('manager');
    Route::get('/august-expense', 'ExpenseController@AugustExpense')->name('august.expense')->middleware('manager');
    Route::get('/september-expense', 'ExpenseController@SeptemberExpense')->name('september.expense')->middleware('manager');
    Route::get('/october-expense', 'ExpenseController@OctoberExpense')->name('october.expense')->middleware('manager');
    Route::get('/november-expense', 'ExpenseController@NovemberExpense')->name('november.expense')->middleware('manager');
    Route::get('/december-expense', 'ExpenseController@DecemberExpense')->name('december.expense')->middleware('manager');

//sales routes are here----

    Route::get('/today-sales', 'SalesController@TodaySales')->name('today.sales')->middleware('manager');
    Route::get('/monthly-sales', 'SalesController@MonthlySales')->name('monthly.sales')->middleware('manager');
    Route::get('/yearly-sales', 'SalesController@YearlySales')->name('yearly.sales')->middleware('manager');

//monthly sales routes are here----

    Route::get('/january-sales', 'SalesController@JanuarySales')->name('january.sales')->middleware('manager');
    Route::get('/february-sales', 'SalesController@FebruarySales')->name('february.sales')->middleware('manager');
    Route::get('/march-sales', 'SalesController@MarchSales')->name('march.sales')->middleware('manager');
    Route::get('/april-sales', 'SalesController@AprilSales')->name('april.sales')->middleware('manager');
    Route::get('/may-sales', 'SalesController@MaySales')->name('may.sales')->middleware('manager');
    Route::get('/june-sales', 'SalesController@JuneSales')->name('june.sales')->middleware('manager');
    Route::get('/july-sales', 'SalesController@JulySales')->name('july.sales')->middleware('manager');
    Route::get('/august-sales', 'SalesController@AugustSales')->name('august.sales')->middleware('manager');
    Route::get('/september-sales', 'SalesController@SeptemberSales')->name('september.sales')->middleware('manager');
    Route::get('/october-sales', 'SalesController@OctoberSales')->name('october.sales')->middleware('manager');
    Route::get('/november-sales', 'SalesController@NovemberSales')->name('november.sales')->middleware('manager');
    Route::get('/december-sales', 'SalesController@DecemberSales')->name('december.sales')->middleware('manager');

    Route::get('/today_expense_pdf', 'DynamicPDFController@today_expense')->middleware('manager');
    Route::get('/monthly_expense_pdf', 'DynamicPDFController@monthly_expense')->middleware('manager');
    Route::get('/yearly_expense_pdf', 'DynamicPDFController@yearly_expense')->middleware('manager');
    Route::get('/today_sales_pdf', 'DynamicPDFController@today_sales')->middleware('manager');
    Route::get('/monthly_sales_pdf', 'DynamicPDFController@monthly_sales')->middleware('manager');
    Route::get('/yearly_sales_pdf', 'DynamicPDFController@yearly_sales')->middleware('manager');
});
