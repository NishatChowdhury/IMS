<?php

use Illuminate\Support\Facades\Route;
use Modules\Settings\Http\Controllers\DbBackupController;
use Modules\Settings\Http\Controllers\EmailSettingController;
use Modules\Settings\Http\Controllers\FeatureController;
use Modules\Settings\Http\Controllers\GalleryController;
use Modules\Settings\Http\Controllers\InstitutionController;
use Modules\Settings\Http\Controllers\LanguageController;
use Modules\Settings\Http\Controllers\MenuController;
use Modules\Settings\Http\Controllers\MessageController;
use Modules\Settings\Http\Controllers\PageController;
use Modules\Settings\Http\Controllers\ResultSettingsController;
use Modules\Settings\Http\Controllers\RolePermissionController;
use Modules\Settings\Http\Controllers\ScheduleController;
use Modules\Settings\Http\Controllers\SettingsController;
use Modules\Settings\Http\Controllers\SiteInformationController;
use Modules\Settings\Http\Controllers\SliderController;
use Modules\Settings\Http\Controllers\LinkController;
use Modules\Settings\Http\Controllers\SocialController;
use Modules\Settings\Http\Controllers\ThemeController;
use Modules\Settings\Http\Controllers\UserController;

Route::group(['prefix'=>'admin'],function(){

    Route::prefix('settings')->group(function() {
        Route::get('/', [SettingsController::class,'index'])->name('settings');
        Route::get('links',[LinkController::class,'index'])->name('settings.link.index');
    });

    # ---------------------------- Institution Mgnt Route by Rimon -------------------------------------
    Route::prefix('institution')->as('institution.')->group(function(){
        //Session @MKH
        Route::get('academicyear',[InstitutionController::class,'academicyear'])->name('academicyear');
        Route::post('store-session', [InstitutionController::class,'store_session'])->name('store_session');
        Route::post('edit-session', [InstitutionController::class,'edit_session'])->name('edit_session');
        Route::post('update-session', [InstitutionController::class,'update_session'])->name('update_session');
        Route::get('delete-session/{id}', [InstitutionController::class,'delete_session'])->name('delete_session');
        Route::patch('status/{id}',[InstitutionController::class,'sessionStatus'])->name('sessionStatus');
        Route::get('{id}/delete-session', [InstitutionController::class,'unAssignSubject'])->name('unAssignSubject');

        //Class
        Route::get('class',[InstitutionController::class,'classes'])->name('classes');
        Route::post('store-class',[InstitutionController::class,'store_class'])->name('store_class');
        Route::get('academic-class',[InstitutionController::class,'academicClasses'])->name('academicClasses');
        Route::post('store-academic-class',[InstitutionController::class,'storeAcademicClass'])->name('storeAcademicClass');
        Route::post('edit-AcademicClass',[InstitutionController::class,'editAcademicClass'])->name('editAcademicClass');
        Route::post('update-AcademicClass',[InstitutionController::class,'updateAcademicClass'])->name('updateAcademicClass');
        Route::post('edit-SessionClass',[InstitutionController::class,'edit_SessionClass'])->name('edit_SessionClass');
        Route::post('update-SessionClass',[InstitutionController::class,'update_SessionClass'])->name('update_SessionClass');
        Route::delete('{id}/delete-SessionClass',[InstitutionController::class,'delete_SessionClass'])->name('delete_SessionClass');

        Route::get('class/subject/{class}',[InstitutionController::class,'classSubjects'])->name('classSubjects');
        //Route::delete('institution/class/subject/destroy/{id}','Backend\InstitutionController@load_online_adminsion_id');
        Route::delete('class/subject/destroy/{id}',[InstitutionController::class,'unAssignSubject'])->name('class.subject.unAssignSubject');

        //section $ Groups
        Route::get('section-groups',[InstitutionController::class,'section_group'])->name('section.group');
        Route::post('create-section', [InstitutionController::class,'create_section'])->name('create_section');
        Route::post('edit-section', [InstitutionController::class,'edit_section'])->name('edit_section');
        Route::post('update-section', [InstitutionController::class,'update_section'])->name('update_section');
        Route::get('{id}/delete-section', [InstitutionController::class,'delete_section'])->name('delete_section');

        Route::post('create-group', [InstitutionController::class,'create_group'])->name('create_group');
        Route::post('edit-group', [InstitutionController::class,'edit_group'])->name('edit_group');
        Route::post('update-group', [InstitutionController::class,'update_group'])->name('update_group');
        Route::get('{id}/delete-group', [InstitutionController::class,'delete_grp'])->name('delete_grp');

        //Subjects
        Route::get('subjects',[InstitutionController::class,'subjects'])->name('subjects');
        Route::post('create-subject',[InstitutionController::class,'create_subject'])->name('create_subject');
        Route::post('edit-subject',[InstitutionController::class,'edit_subject'])->name('edit_subject');
        Route::post('update-subject',[InstitutionController::class,'update_subject'])->name('update_subject');
        Route::get('{id}/delete-subject',[InstitutionController::class,'delete_subject'])->name('delete_subject');

        //Route::get('institution/classsubjects','Backend\InstitutionController@classsubjects')->name('institution.classsubjects');
        Route::post('assign-subject',[InstitutionController::class,'assignSubject'])->name('assign.subject');
        //Route::post('institution/assign-subject','Backend\InstitutionController@assign_subject')->name('assign.subject');
        Route::post('edit-assigned-subject',[InstitutionController::class,'edit_assigned'])->name('edit.assign');
        Route::get('{id}/delete-assigned-subject',[InstitutionController::class,'delete_assigned'])->name('delete_assigned');
        Route::get('profile',[InstitutionController::class,'profile'])->name('institution.profile')->name('profile');

        // signature
        Route::get('signature',[InstitutionController::class,'signature'])->name('signature');
        Route::post('sig',[InstitutionController::class,'sig'])->name('sig');

        //Class Schedule
        Route::get('class/schedule/{class}',[ScheduleController::class,'index'])->name('class.schedule.index');
        Route::post('class/schedule/store',[ScheduleController::class,'store'])->name('class.schedule.store');
        Route::post('class/schedule/update',[ScheduleController::class,'update'])->name('class.schedule.update');
        Route::get('class/schedule/delete/{id}',[ScheduleController::class,'delete'])->name('class.schedule.delete');

        // Teacher assign
        Route::get('institution/assign-teacher/{id}', [InstitutionController::class,'assignTeacher'])->name('assignTeacher');
        Route::post('institution/assign-teacher-store', [InstitutionController::class,'assignTeacherStore'])->name('assignTeacher.store');

    });

    # ---------------------------------------------- CMS -------------------------------------------------------
        // Menu Routes Starts
        Route::get('menus',[MenuController::class,'index'])->name('menu.index');
        Route::post('menus-search',[MenuController::class,'search'])->name('menus.search');
        Route::post('menu/store',[MenuController::class,'store'])->name('menu.store');
        Route::get('menu/edit',[MenuController::class,'edit'])->name('menu.edit');
        Route::patch('menu/{id}/update',[MenuController::class,'update'])->name('menu.update');
        Route::delete('menu/destroy/{id}',[MenuController::class,'destroy'])->name('menu.destroy');

        // Page Mgmt
        Route::get('pages',[PageController::class,'index'])->name('page.index');
        Route::get('page/create',[PageController::class,'create'])->name('page.create');
        Route::post('page/store',[PageController::class,'store'])->name('page.store');
        Route::get('page/edit/{id}',[PageController::class,'edit'])->name('page.edit');
        Route::patch('pages/{id}/update',[PageController::class,'update'])->name('page.update');
        Route::delete('pages/destroy/{id}',[PageController::class,'destroy'])->name('page.destroy');
        Route::delete('pages/remove/{id}',[PageController::class,'remove'])->name('page.remove');

        # frontend setting
        // principal, chairman message and institute
        Route::get('chairmanMessage',[MessageController::class,'editChairmanMessage'])->name('chairmanMessage.index');
        Route::get('principalMessage',[MessageController::class,'editPrincipalMessage'])->name('principalMessage.index');
        Route::get('aboutInstitute',[MessageController::class,'editAboutInstitute'])->name('aboutInstitute.index');
        // principal , chairman and institute message update route
        Route::patch('chairmanMessageUpdate',[MessageController::class,'instituteMessageUpdate'])->name('instituteMessageUpdate');

        // site info
        Route::get('siteinfo',[SiteInformationController::class,'index'])->name('siteinfo');
        Route::patch('site-info/update',[SiteInformationController::class,'update'])->name('site-info.update');
        Route::patch('site-info/google_map',[SiteInformationController::class,'update_google_map'])->name('site-info.update_google_map');
        Route::patch('site-info/logo',[SiteInformationController::class,'logo'])->name('site-info.logo');

        // gallary corner /suborno joyontee
        Route::get('GalleryCornerCreate',[GalleryController::class,'galleryCornerCreate'])->name('galleryCorner.create');
        Route::post('GalleryCornerStore',[GalleryController::class,'galleryCornerStore'])->name('GalleryCornerStore');
        Route::get('GalleryImageDestroy/{id}',[GalleryController::class,'GalleryImageDestroy'])->name('GalleryImage.destroy');

        // feature
        Route::get('features',[FeatureController::class,'index'])->name('features.index');
        Route::get('feature/create',[FeatureController::class,'create'])->name('features.create');
        Route::post('feature/store',[FeatureController::class,'store'])->name('features.store');
        Route::get('feature/edit/{id}',[FeatureController::class,'edit'])->name('features.edit');
        Route::patch('feature/{id}/update',[FeatureController::class,'update'])->name('features.update');
        Route::delete('feature/destroy/{id}',[FeatureController::class,'destroy'])->name('features.destroy');

        // sliders
        Route::get('sliders',[SliderController::class,'index'])->name('slider.index');
        Route::post('slider/store',[SliderController::class,'store'])->name('slider.store');
        Route::delete('slider/destroy/{id}',[SliderController::class,'destroy'])->name('slider.destroy');

        // Important Links
        Route::get('settings/links',[LinkController::class,'index'])->name('setting.index');
        Route::post('settings/link/store',[LinkController::class,'store'])->name('setting.store');
        Route::delete('settings/link/delete/{id}',[LinkController::class,'destroy'])->name('setting.destroy');

        // Social Links
        Route::get('socials',[SocialController::class,'index'])->name('social.index');
        Route::post('socials/update/{id}',[SocialController::class,'update'])->name('social.store');

        # ---------------------------------------------- Settings -------------------------------------------------------
        // E-mail setting
        Route::get('setting/email', [EmailSettingController::class,'index'])->name('setting.email');
        Route::post('setting/email/store', [EmailSettingController::class,'store'])->name('email.store');
        Route::post('setting/email/edit', [EmailSettingController::class,'edit'])->name('email.edit');
        Route::post('setting/email/update', [EmailSettingController::class,'update'])->name('email.update');
        Route::delete('setting/email/delete/{id}', [EmailSettingController::class,'destroy'])->name('email.delete');

        // Theme
        Route::get('themes',[ThemeController::class,'index'])->name('theme.index');
        Route::get('theme/edit/{id}',[ThemeController::class,'edit'])->name('theme.edit');
        Route::delete('theme/destroy/{id}',[ThemeController::class,'destroy'])->name('theme.destroy');
        Route::get('theme/change/{id}',[ThemeController::class,'change'])->name('admin.theme.change');

        // Language
        Route::get('languages',[LanguageController::class,'index'])->name('language.index');
        Route::post('add-languages',[LanguageController::class,'store'])->name('languages.add');
        Route::post('change-status',[LanguageController::class,'status'])->name('change.status');
        Route::patch('default-update',[LanguageController::class,'defaultUpdate'])->name('default.update');
        Route::post('lang-delete/{id}',[LanguageController::class,'delete'])->name('lang.delete');
        Route::get('lang-edit/{id}',[LanguageController::class,'edit'])->name('lang.edit');
        Route::post('lang-update',[LanguageController::class,'update'])->name('lang.update');
        Route::get('lang/translation/{id}',[LanguageController::class,'translation'])->name('lang.translation');
        Route::post('lang/translate/{id}',[LanguageController::class,'translate'])->name('lang.translate');

    // Result Settings
        Route::get('results',[ResultSettingsController::class,'index'])->name('result.index');


    # ---------------------------------------------- User Management -------------------------------------------------------
        // User
        Route::get('users',[UserController::class,'index'])->name('user.index');
        Route::get('user/create',[UserController::class,'create'])->name('user.add');
        Route::post('user/store',[UserController::class,'store'])->name('user.store');
        Route::get('user/edit/{id}',[UserController::class,'edit'])->name('user.edit');
        Route::post('user/assign-role-update',[UserController::class,'assignRoleUpdate'])->name('user.assign.role.update');
        Route::delete('user/destroy/{id}',[UserController::class,'destroy'])->name('user.destroy');
        // profile
        Route::get('user/profile',[UserController::class,'profile'])->name('user.profile');
        Route::patch('user/update',[UserController::class,'update'])->name('user.update');
        Route::patch('user/password',[UserController::class,'password'])->name('user.password');

        // role
        Route::get('role',[RolePermissionController::class, 'roleIndex'])->name('role.index');
        Route::get('role-create',[RolePermissionController::class, 'roleCreate'])->name('role.create');
        Route::post('role-store',[RolePermissionController::class, 'roleStore'])->name('role.store');
        Route::get('role-edit/{role}',[RolePermissionController::class, 'roleEdit'])->name('role.edit');
        Route::post('role-update',[RolePermissionController::class, 'roleUpdate'])->name('role.update');
        //create module for development
        Route::get('module-create',[RolePermissionController::class, 'moduleCreate'])->name('module.create');
        Route::post('module-store',[RolePermissionController::class, 'moduleStore'])->name('module.store');

        // Db-Backup
        Route::get('db-backup',[DbBackupController::class,'index'])->name('backup.db');
        Route::get('backup-download/{file_name}',[DbBackupController::class,'download'])->name('backup.download');
        Route::get('add-backup',[DbBackupController::class,'createDatabaseBackup'])->name('backup.create');

        // Result System Setup
        Route::get('result-system',[SiteInformationController::class,'resultSystem'])->name('result-system.index');
        Route::post('result-system/{id1}/result-system-1', [SiteInformationController::class,'resultSystem1'])->name('result-system.result-system-1');
        Route::post('result-system/{id2}/result-system-2', [SiteInformationController::class,'resultSystem2'])->name('result-system.result-system-2');
        Route::post('result-system/{id3}/result-system-2', [SiteInformationController::class,'resultSystem3'])->name('result-system.result-system-3');
        Route::post('result-system/{id4}/result-system-2', [SiteInformationController::class,'resultSystem4'])->name('result-system.result-system-4');

});



//Settings Route by Rimon
Route::get('settings/basicInfo',[SettingsController::class,'basicInfo'])->name('settings.basicInfo');