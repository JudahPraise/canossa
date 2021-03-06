<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('login-pages.employee');
});

Auth::routes();


Route::group(['middleware' => 'prevent-back-history'],function(){
    // Forgot Password Employee
    Route::get('/employee/forgot-password', 'EmployeePasswordRequestController@employeeIndex')->name('employeeIndex');
    Route::post('/employee/forgot-password/send-request', 'EmployeePasswordRequestController@sendRequestEmployee')->name('forgotpass.request');
    Route::get('/employee/forgot-password/request-sent', 'EmployeePasswordRequestController@requestSentEmployee')->name('forgotpass.request.sent');
    Route::get('/employee/change-password/{id}', 'EmployeePasswordRequestController@changePassword')->name('changepass.index');
    Route::put('/employee/change-password/submit/{id}/{reqid}', 'EmployeePasswordRequestController@updatePassword')->name('changepass.update');

    // Forgot Password Admin
    Route::get('/admin/forgot-password', 'AdminPasswordRequestController@index')->name('forgotpass.index.admin');
    Route::post('/admin/forgot-password/send-request', 'AdminPasswordRequestController@sendRequestAdmin')->name('forgotpass.request.admin');
    Route::get('/admin/forgot-password/request-sent', 'AdminPasswordRequestController@requestSentAdmin')->name('forgotpass.request.sent.admin');
    Route::get('/admin/change-password/{id}', 'AdminPasswordRequestController@changePassword')->name('changepass.index.admin');
    Route::put('/admin/change-password/submit/{id}/{reqid}', 'AdminPasswordRequestController@updatePassword')->name('changepass.update.admin');

    //Forgot Password Nurse
    Route::get('/nurse/forgot-password', 'NursePasswordRequestController@index')->name('forgotpass.index.nurse');
});


Route::prefix('admin')->group(function(){
    Route::get('/login', 'Admin\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Admin\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/logout', 'Admin\AdminLoginController@logout')->name('admin.logout');
    Route::post('/password-confirm', 'Admin\ConfirmPasswordController@confirm')->name('admin.password.confirm.submit');
    Route::get('/password-confirm', 'Admin\ConfirmPasswordController@showConfirmForm')->name('admin.password.confirm');
    Route::post('/password-email', 'Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email'); //? Forgot Password Enter Email Submit
    Route::get('/password-reset', 'Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request'); //? Forgot Password Enter Email Show
    Route::post('password-reset', 'Admin\ResetPasswordController@reset')->name('admin.password.update');
    Route::get('/password-reset/{token}', 'Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');
    Route::get('/', 'AdminController@index')->name('admin');
    Route::get('/fetch', 'AdminController@getCategory')->name('admin.fetch.category');
    //Admins
    Route::prefix('/admins')->group(function(){
        Route::get('/', 'Admin\AdminsController@index')->name('admin.accounts');
        Route::get('/create-admin','Admin\AdminsController@create')->name('admin.create');
        Route::get('/getEmployees','Admin\AdminsController@getEmployees')->name('admin.getEmployees');
        Route::get('/getEmployee/{id}', 'Admin\AdminsController@getEmployee')->name('admin.getEmployee');
        Route::post('/assign-as-admin', 'Admin\AdminsController@assignAdmin')->name('admin.assign');
        Route::get('/change-user/{position}','Admin\AdminsController@changeUser')->name('admin.changeUser');
        Route::get('/getEmployee/{id}/{position}', 'Admin\AdminsController@selectUser')->name('admin.selectUser');
        Route::put('/update-user/{position}', 'Admin\AdminsController@updateUser')->name('admin.updateUser');
    });
    //Account
    Route::prefix('/account')->group(function(){
        Route::get('/{id}', 'Admin\AccountController@index')->name('admin.account.index');
        Route::put('/update/{id}', 'Admin\AccountController@update')->name('admin.account.update');
    });
    //Announcements
    Route::prefix('/announcements')->group(function(){
        Route::get('/', 'Admin\AnnouncementController@index')->name('announcement.index');
        Route::post('/store', 'Admin\AnnouncementController@store')->name('announcement.store');
        Route::delete('/delete/{id}', 'Admin\AnnouncementController@delete')->name('announcement.delete');
        Route::post('/update', 'Admin\AnnouncementController@update')->name('announcement.update');
    });
    //Manage Accounts
    Route::prefix('/manage-accounts')->group(function(){
        Route::get('/', 'Admin\RegisterController@index')->name('accounts.index');
        Route::get('/fetch', 'Admin\RegisterController@getCategory')->name('accounts.fetch.category');
        Route::post('/register', 'Admin\RegisterController@post')->name('register.post');
        Route::delete('/remove/{id}', 'Admin\RegisterController@destroy')->name('register.delete');
    });
    //Messages
    Route::prefix('/messages')->group(function(){
        Route::get('/', 'Admin\MessageController@index')->name('message.index');
        Route::post('/send', 'MessageController@send')->name('send');
        Route::post('/reply', 'MessageController@reply')->name('reply');
    });
    //Employees
    Route::prefix('/employees')->group(function(){
        Route::get('/', 'Admin\EmployeesController@index')->name('employees');
        Route::get('/show/{id}', 'Admin\EmployeesController@show')->name('employee.show');
    });
    //Feedback
    Route::get('/employee-feedback', 'Admin\FeedbackController@index')->name('admin.feedback.index');
    //Resigned Employee
    Route::get('/resigned/{id}', 'ResignController@resign')->name('resigned');
    Route::get('/retrieved/{id}', 'ResignController@retrieve')->name('retrieve');

    // Password Reset
    Route::get('/password-reset', 'Admin\PasswordResetController@index')->name('passwordreset.index');
    Route::post('/password-reset/confirm/{id}', 'Admin\PasswordResetController@passwordConfirm')->name('passwordreset.confirm');
    Route::put('/password-reset/update/{id}/{category}', 'Admin\PasswordResetController@update')->name('passwordreset.update');

});

Route::prefix('employee')->group(function(){
    Route::get('/login', 'Auth\LoginController@showLoginForm')->name('employee.login');
    Route::post('/login', 'Auth\LoginController@login')->name('employee.login.submit');
    Route::get('/logout', 'Auth\LoginController@logout')->name('employee.logout');
    Route::get('/', 'HomeController@index')->name('home');
    Route::post('/send', 'MessageController@send')->name('employee.send');
    Route::put('/update-profile-picture', 'Employee\ImageController@update')->name('image.update');
    Route::post('/send', 'MessageController@send')->name('employee.send');
    Route::post('/reply', 'MessageController@reply')->name('employee.reply');
    //Announcements
    Route::prefix('/announcement')->group(function(){
        Route::get('/mark-as-read/{id}', 'Employee\AnnouncementController@markAsRead')->name('announcement.markAsRead');    
        Route::get('/mark-all-as-read', 'Employee\AnnouncementController@markAllAsRead')->name('announcement.markAllAsRead');    
    });

    //Schedule
    Route::prefix('/schedule')->group(function(){
        Route::get('/', 'Employee\ScheduleController@index')->name('schedule.index');
        Route::post('/store', 'Employee\ScheduleController@store')->name('schedule.store');
        Route::post('/update', 'Employee\ScheduleController@update')->name('schedule.update');
        Route::delete('/delete/{id}', 'Employee\ScheduleController@delete')->name('schedule.delete');
        Route::get('/filter/{day}', 'Employee\ScheduleController@filter')->name('schedule.filter');
        Route::get('/filter/all', 'Employee\ScheduleController@filterAll')->name('schedule.filter-all');
    });
    //Portfolio
    Route::prefix('/portfolio')->group(function(){
        Route::get('/index/{view}', 'Employee\PortfolioController@index')->name('portfolio.index');
        //Personal-Information
        Route::prefix('/personal-information')->group(function(){
            Route::get('/', 'Employee\Portfolio\PersonalInfoController@index')->name('personal.index');
            Route::get('/create', 'Employee\Portfolio\PersonalInfoController@create')->name('personal.create');
            Route::post('/create/post', 'Employee\Portfolio\PersonalInfoController@store')->name('personal.post');
            Route::get('/edit/{id}', 'Employee\Portfolio\PersonalInfoController@edit')->name('personal.edit');
            Route::put('/edit/update/{id}', 'Employee\Portfolio\PersonalInfoController@update')->name('personal.update');
        });
        //Family Background
        Route::prefix('/family-background')->group(function(){
            Route::get('/index/{view}', 'Employee\Portfolio\Family\MainController@index')->name('family.index');
            Route::get('/show/{id}', 'Employee\Portfolio\Family\MainController@show')->name('family.show');
            //Spouse
            Route::prefix('/spouse')->group(function(){
                Route::get('/create', 'Employee\Portfolio\Family\SpouseController@create')->name('spouse.create');
                Route::post('/store', 'Employee\Portfolio\Family\SpouseController@store')->name('spouse.store');
                Route::get('/show/{id}', 'Employee\Portfolio\Family\SpouseController@show')->name('spouse.show');
                Route::get('/edit/{id}', 'Employee\Portfolio\Family\SpouseController@edit')->name('spouse.edit');
                Route::put('/update/{id}', 'Employee\Portfolio\Family\SpouseController@update')->name('spouse.update');
            });
            //Mother
            Route::prefix('/mother')->group(function(){
                Route::get('/create', 'Employee\Portfolio\Family\MotherController@create')->name('mother.create');
                Route::post('/store', 'Employee\Portfolio\Family\MotherController@store')->name('mother.store');
                Route::get('/show/{id}', 'Employee\Portfolio\Family\MotherController@show')->name('mother.show');
                Route::get('/edit/{id}', 'Employee\Portfolio\Family\MotherController@edit')->name('mother.edit');
                Route::put('/update/{id}', 'Employee\Portfolio\Family\MotherController@update')->name('mother.update');
            });
            //Father
            Route::prefix('/father')->group(function(){
                Route::get('/create', 'Employee\Portfolio\Family\FatherController@create')->name('father.create');
                Route::post('/store', 'Employee\Portfolio\Family\FatherController@store')->name('father.store');
                Route::get('/show/{id}', 'Employee\Portfolio\Family\FatherController@show')->name('father.show');
                Route::get('/edit/{id}', 'Employee\Portfolio\Family\FatherController@edit')->name('father.edit');
                Route::put('/update/{id}', 'Employee\Portfolio\Family\FatherController@update')->name('father.update');
            });
            //Children
            Route::prefix('/children')->group(function(){
                Route::get('/create', 'Employee\Portfolio\Family\ChildrenController@create')->name('children.create');
                Route::post('/store', 'Employee\Portfolio\Family\ChildrenController@store')->name('children.store');
                Route::get('/show/{id}', 'Employee\Portfolio\Family\ChildrenController@show')->name('children.show');
                Route::get('/edit/{id}', 'Employee\Portfolio\Family\ChildrenController@edit')->name('children.edit');
                Route::put('/update/{id}', 'Employee\Portfolio\Family\ChildrenController@update')->name('children.update');
                Route::delete('/destroy/{id}', 'Employee\Portfolio\Family\ChildrenController@destroy')->name('children.destroy');
            });
        });
        //Educational Background
        Route::prefix('/educational-background')->group(function(){
            Route::get('/index/{view}', 'Employee\Portfolio\Educational\MainController@index')->name('educ.index');
            Route::get('show/{id}', 'Employee\Portfolio\Educational\MainController@show')->name('educ.show');
            Route::prefix('/elem')->group(function(){
                Route::get('/create', 'Employee\Portfolio\Educational\ElementaryController@create')->name('elem.create');
                Route::post('/store', 'Employee\Portfolio\Educational\ElementaryController@store')->name('elem.store');
                Route::get('/edit/{id}', 'Employee\Portfolio\Educational\ElementaryController@edit')->name('elem.edit');
                Route::put('/update/{id}', 'Employee\Portfolio\Educational\ElementaryController@update')->name('elem.update');
                Route::delete('/delete/{id}', 'Employee\Portfolio\Educational\ElementaryController@destroy')->name('elem.delete');
            });
            Route::prefix('/sec')->group(function(){
                Route::get('/create', 'Employee\Portfolio\Educational\SecondaryController@create')->name('sec.create');
                Route::post('/store', 'Employee\Portfolio\Educational\SecondaryController@store')->name('sec.store');
                Route::get('/edit/{id}', 'Employee\Portfolio\Educational\SecondaryController@edit')->name('sec.edit');
                Route::put('/update/{id}', 'Employee\Portfolio\Educational\SecondaryController@update')->name('sec.update');
                Route::delete('/delete/{id}', 'Employee\Portfolio\Educational\SecondaryController@destroy')->name('sec.delete');
            });
            Route::prefix('/col')->group(function(){
                Route::get('/create', 'Employee\Portfolio\Educational\CollegeController@create')->name('col.create');
                Route::post('/store', 'Employee\Portfolio\Educational\CollegeController@store')->name('col.store');
                Route::get('/edit/{id}', 'Employee\Portfolio\Educational\CollegeController@edit')->name('col.edit');
                Route::put('/update/{id}', 'Employee\Portfolio\Educational\CollegeController@update')->name('col.update');
                Route::delete('/delete/{id}', 'Employee\Portfolio\Educational\CollegeController@destroy')->name('col.delete');
            });
            Route::prefix('/grad')->group(function(){
                Route::get('/create', 'Employee\Portfolio\Educational\GraduateStudyController@create')->name('grad.create');
                Route::post('/store', 'Employee\Portfolio\Educational\GraduateStudyController@store')->name('grad.store');
                Route::get('/edit/{id}', 'Employee\Portfolio\Educational\GraduateStudyController@edit')->name('grad.edit');
                Route::put('/update/{id}', 'Employee\Portfolio\Educational\GraduateStudyController@update')->name('grad.update');
                Route::delete('/delete/{id}', 'Employee\Portfolio\Educational\GraduateStudyController@destroy')->name('grad.delete');
            });
        });
        //Work Experience
        Route::prefix('/work-experience')->group(function(){
            Route::get('/', 'Employee\Portfolio\WorkExperienceController@index')->name('work.index');
            Route::get('/edit/{id}', 'Employee\Portfolio\WorkExperienceController@edit')->name('work.edit');
            Route::get('/create', 'Employee\Portfolio\WorkExperienceController@create')->name('work.create');
            Route::post('/store', 'Employee\Portfolio\WorkExperienceController@store')->name('work.store');
            Route::get('/show/{id}', 'Employee\Portfolio\WorkExperienceController@show')->name('work.show');
            Route::put('/update/{id}', 'Employee\Portfolio\WorkExperienceController@update')->name('work.update');
            Route::delete('/delete/{id}', 'Employee\Portfolio\WorkExperienceController@destroy')->name('work.delete');
        });
        //Training Program
        Route::prefix('/training-program')->group(function(){
            Route::get('/', 'Employee\Portfolio\TrainingProgramController@index')->name('training.index');
            Route::get('/edit/{id}', 'Employee\Portfolio\TrainingProgramController@edit')->name('training.edit');
            Route::get('/create', 'Employee\Portfolio\TrainingProgramController@create')->name('training.create');
            Route::post('/store', 'Employee\Portfolio\TrainingProgramController@store')->name('training.store');
            Route::get('/show/{id}', 'Employee\Portfolio\TrainingProgramController@show')->name('training.show');
            Route::put('/update/{id}', 'Employee\Portfolio\TrainingProgramController@update')->name('training.update');
            Route::delete('/delete/{id}', 'Employee\Portfolio\TrainingProgramController@destroy')->name('training.delete');
            Route::get('/download-certificate/{id}', 'Employee\Portfolio\TrainingProgramController@download')->name('training.download');
        });
        //Voluntary Work
        Route::prefix('/voluntary-work')->group(function(){
            Route::get('/', 'Employee\Portfolio\VoluntaryWorksController@index')->name('voluntary.index');
            Route::get('/edit/{id}', 'Employee\Portfolio\VoluntaryWorksController@edit')->name('voluntary.edit');
            Route::get('/create', 'Employee\Portfolio\VoluntaryWorksController@create')->name('voluntary.create');
            Route::post('/store', 'Employee\Portfolio\VoluntaryWorksController@store')->name('voluntary.store');
            Route::get('/show/{id}', 'Employee\Portfolio\VoluntaryWorksController@show')->name('voluntary.show');
            Route::put('/update/{id}', 'Employee\Portfolio\VoluntaryWorksController@update')->name('voluntary.update');
            Route::delete('/delete/{id}', 'Employee\Portfolio\VoluntaryWorksController@destroy')->name('voluntary.delete');
        });
        // Documents
        Route::prefix('/document')->group(function(){
            Route::get('/', 'DocumentsController@index')->name('document.index');
            Route::post('/store', 'DocumentsController@store')->name('document.store');
            Route::put('/update/{id}', 'DocumentsController@update')->name('document.update');
            Route::delete('/delete{id}', 'DocumentsController@delete')->name('document.delete');
            Route::get('/download/{id}', 'DocumentsController@download')->name('document.download'); 
        });
    });
    //Resume
    Route::get('/resume', 'Employee\ResumeController@index')->name('resume');
    //Profile
    Route::prefix('profile')->group(function(){
        Route::get('/index', 'Employee\ProfileController@index')->name('profile.index');
    });
    //Medical Record
    Route::prefix('/medical-record')->group(function(){
        Route::get('/', 'Employee\MedicalRecord\MedicalRecordController@index')->name('record.index');
        Route::get('/create/{id}', 'Employee\MedicalRecord\MedicalRecordController@create')->name('record.create');
        Route::post('/add-record/{id}', 'Employee\MedicalRecord\MedicalRecordController@storeRecord')->name('record.add');
        Route::get('/show/{id}', 'Employee\MedicalRecord\MedicalRecordController@show')->name('record.show');
        Route::post('/school-year/update', 'Employee\MedicalRecord\MedicalRecordController@store')->name('record.store');
        //Labtest
        Route::prefix('/lab-test')->group(function(){
            Route::post('/upload-labtest/{id}', 'Employee\MedicalRecord\LabTestController@store')->name('employee.labtest.store');
            Route::delete('/delete-labtest/{id}', 'Employee\MedicalRecord\LabTestController@destroy')->name('employee.labtest.delete');
            Route::get('/download-labtest/{id}', 'Employee\MedicalRecord\LabTestController@download')->name('employee.labtest.download');
            // Route::put('/update-labtest/{id}', 'Employee\RecordController@update')->name('record.update');
        });
        //Medical History
        Route::prefix('/history')->group(function(){
            Route::get('/create/{id}', 'Employee\MedicalRecord\MedicalHistoryController@index')->name('employee.history.create');
            Route::post('/store/{id}', 'Employee\MedicalRecord\MedicalHistoryController@store')->name('employee.history.store');
            Route::get('/edit/{id}', 'Employee\MedicalRecord\MedicalHistoryController@edit')->name('employee.history.edit');
            Route::put('/update/{id}', 'Employee\MedicalRecord\MedicalHistoryController@update')->name('employee.history.update');
            Route::delete('/delete/{id}', 'Employee\MedicalRecord\MedicalHistoryController@destroy')->name('employee.history.delete');
        });
        //Hospitalization
        Route::prefix('/hospitalization')->group(function(){
            Route::get('/create/{id}', 'Employee\MedicalRecord\HospitalizationController@index')->name('employee.hospitalization.create');
            Route::post('/store/{id}', 'Employee\MedicalRecord\HospitalizationController@store')->name('employee.hospitalization.store');
            Route::get('/edit/{id}', 'Employee\MedicalRecord\HospitalizationController@edit')->name('employee.hospitalization.edit');
            Route::put('/update/{id}', 'Employee\MedicalRecord\HospitalizationController@update')->name('employee.hospitalization.update');
            Route::delete('/delete/{id}', 'Employee\MedicalRecord\HospitalizationController@destroy')->name('employee.hospitalization.update');
        });
        //Medication
        Route::prefix('/medication')->group(function(){
            Route::get('/create/{id}', 'Employee\MedicalRecord\MedicationController@index')->name('employee.medication.create');
            Route::post('/store/{id}', 'Employee\MedicalRecord\MedicationController@store')->name('employee.medication.store');
            Route::put('/update/{id}', 'Employee\MedicalRecord\MedicationController@update')->name('employee.medication.update');
            Route::delete('/delete/{id}', 'Employee\MedicalRecord\MedicationController@destroy')->name('employee.medication.delete');
        });
        //Immunization
        Route::prefix('/immunization')->group(function(){
            Route::get('/create/{id}', 'Employee\MedicalRecord\ImmunizationController@index')->name('employee.immunization.create');
            Route::post('/store/{id}', 'Employee\MedicalRecord\ImmunizationController@store')->name('employee.immunization.store');
            Route::put('/update/{id}', 'Employee\MedicalRecord\ImmunizationController@update')->name('employee.immunization.update');
            Route::delete('/delete/{id}', 'Employee\MedicalRecord\ImmunizationController@destroy')->name('employee.immunization.delete');
        });
    });
    //Settings
    Route::get('/settings', 'Employee\SettingsController@index')->name('settings');
    Route::put('/settings/update/{id}', 'Employee\SettingsController@update')->name('account.update');
    //Feedback
    Route::get('/feedback/index', 'FeedbackController@index')->name('feedback.index');
    Route::post('/feedback/logout', 'FeedbackController@store')->name('feedback.store');
    Route::post('/feedback', 'FeedbackController@storeToFeedback')->name('feedback.storeToFeedback');
    Route::put('/feedback/update{id}', 'FeedbackController@update')->name('feedback.update');

});


Route::prefix('medical-record')->group(function(){

    Route::get('/', 'NurseController@index')->name('nurse');
    Route::post('/assign-nurse/{id}', 'Medical\RegisterController@post')->name('assign.nurse');
    Route::get('/medical/login-page', 'Medical\NurseLoginController@showLoginForm')->name('nurse.login');
    Route::post('/login', 'Medical\NurseLoginController@login')->name('nurse.login.submit');
    Route::get('/logout', 'Medical\NurseLoginController@logout')->name('nurse.logout');

    Route::get('/dashboard', 'Medical\DashboardController@index')->name('medical.dashboard');
    Route::get('/employee/{id}', 'Medical\DashboardController@show')->name('medical.show');

    Route::get('/lab-tests', 'Medical\LabTestController@index')->name('labtest.index');
    Route::post('/lab-tests/upload/{id}', 'Medical\LabTestController@store')->name('labtest.store');
    Route::put('/lab-tests/update/{id}', 'Medical\LabTestController@update')->name('labtest.update');

    //Medical Record
    Route::prefix('/nurse')->group(function(){

        Route::prefix('/lab-test')->group(function(){
            Route::post('/upload-labtest', 'Employee\MedicalRecord\LabTestController@store')->name('nurse.labtest.store');
            Route::delete('/delete-labtest/{id}', 'Employee\MedicalRecord\LabTestController@destroy')->name('nurse.labtest.delete');
            Route::get('/download-labtest/{id}', 'Employee\MedicalRecord\LabTestController@download')->name('nurse.labtest.download');
            // Route::put('/update-labtest/{id}', 'Employee\RecordController@update')->name('record.update');
        });
        //Medical History
        Route::prefix('/history')->group(function(){
            Route::get('/create/{id}', 'Employee\MedicalRecord\MedicalHistoryController@index')->name('nurse.history.create');
            Route::post('/store/{id}', 'Employee\MedicalRecord\MedicalHistoryController@store')->name('nurse.history.store');
            Route::get('/edit/{id}', 'Employee\MedicalRecord\MedicalHistoryController@edit')->name('nurse.history.edit');
            Route::put('/update/{id}', 'Employee\MedicalRecord\MedicalHistoryController@update')->name('nurse.history.update');
            Route::delete('/delete/{id}', 'Employee\MedicalRecord\MedicalHistoryController@destroy')->name('nurse.history.delete');
        });
        //Hospitalization
        Route::prefix('/hospitalization')->group(function(){
            Route::get('/create/{id}', 'Employee\MedicalRecord\HospitalizationController@index')->name('nurse.hospitalization.create');
            Route::post('/store/{id}', 'Employee\MedicalRecord\HospitalizationController@store')->name('nurse.hospitalization.store');
            Route::get('/edit/{id}', 'Employee\MedicalRecord\HospitalizationController@edit')->name('nurse.hospitalization.edit');
            Route::put('/update/{id}', 'Employee\MedicalRecord\HospitalizationController@update')->name('nurse.hospitalization.update');
            Route::delete('/delete/{id}', 'Employee\MedicalRecord\HospitalizationController@destroy')->name('nurse.hospitalization.update');
        });
        //Medication
        Route::prefix('/medication')->group(function(){
            Route::get('/create/{id}', 'Employee\MedicalRecord\MedicationController@index')->name('nurse.medication.create');
            Route::post('/store/{id}', 'Employee\MedicalRecord\MedicationController@store')->name('nurse.medication.store');
            Route::put('/update/{id}', 'Employee\MedicalRecord\MedicationController@update')->name('nurse.medication.update');
            Route::delete('/delete/{id}', 'Employee\MedicalRecord\MedicationController@destroy')->name('nurse.medication.delete');
        });
        //Immunization
        Route::prefix('/immunization')->group(function(){
            Route::get('/create/{id}', 'Employee\MedicalRecord\ImmunizationController@index')->name('nurse.immunization.create');
            Route::post('/store/{id}', 'Employee\MedicalRecord\ImmunizationController@store')->name('nurse.immunization.store');
            Route::put('/update/{id}', 'Employee\MedicalRecord\ImmunizationController@update')->name('nurse.immunization.update');
            Route::delete('/delete/{id}', 'Employee\MedicalRecord\ImmunizationController@destroy')->name('nurse.immunization.delete');
        });
    });

    Route::prefix('/medication')->group(function(){
        Route::get('/', 'Medical\MedicationController@index')->name('medication.index');
        Route::post('/store', 'Medical\MedicationController@store')->name('medication.store');
        Route::put('/update/{id}', 'Medical\MedicationController@update')->name('medication.update');
        Route::delete('/delete/{id}', 'Medical\MedicationController@destroy')->name('medication.delete');
    });


    Route::prefix('/labtest-schedule')->group(function(){
        Route::post('/store', 'LabtestSchedController@store')->name('labtestSchedule.store');
    });

});