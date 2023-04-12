<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('newcustomers', function (Blueprint $table) {
            $table->id();
            $table->char('name')->nullable();
            $table->text('nameId')->nullable();
            $table->char('firstName')->nullable();
            $table->char('lastName')->nullable();
            $table->char('title')->nullable();
            $table->char('company')->nullable();
            $table->integer('phone')->nullable();
            $table->integer('phone2')->nullable();
            $table->text('email')->nullable();
            $table->char('website')->nullable();
            $table->char('address')->nullable();
            $table->char('address2')->nullable();
            $table->char('city')->nullable();
            $table->char('state')->nullable();
            $table->text('zipcode')->nullable();
            $table->text('country')->nullable();
            $table->text('visibility')->nullable();
            $table->text('assignedTo')->nullable();
            $table->string('backgroundInfo')->nullable();
            $table->string('twitter')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('skype')->nullable();
            $table->string('googleplus')->nullable();
            $table->string('lastUpdated')->nullable();
            $table->string('lastActivity')->nullable();
            $table->string('updatedBy')->nullable();
            $table->string('priority')->nullable();
            $table->string('leadSource')->nullable();
            $table->string('leadDate')->nullable();
            $table->string('rating')->nullable();
            $table->string('createDate')->nullable();
          
            $table->char('facebook')->nullable();
            $table->char('otherUrl')->nullable();
            $table->char('leadtype')->nullable();
            $table->string('closedate')->nullable();
            $table->char('expectedCloseDate')->nullable();
            $table->char('interest')->nullable();
            $table->char('leadstatus')->nullable();
            $table->char('dealvalue')->nullable();
            $table->char('leadscore')->nullable();
            $table->char('dealstatus')->nullable();
            $table->char('timezone')->nullable();
            $table->char('doNotCall')->nullable();
            $table->char('doNotEmail')->nullable();
            $table->char('trackingKey')->nullable();
            $table->char('dupeCheck')->nullable();
            $table->char('fingerprintId')->nullable();
            $table->char('reverseIp')->nullable();
            $table->text('c_Tech_Notes')->nullable();
            $table->string('c_Valid_from')->nullable();
            $table->char('c_')->nullable();
            $table->string('c_issue')->nullable();
            $table->string('c_Amount_paid')->nullable();
            $table->string('c_Account_id')->nullable();
            $table->string('c_Upgrade_Amt')->nullable();
            $table->string('c_Add_Security')->nullable();
            $table->string('c_O_system')->nullable();
            $table->string('c_services')->nullable();
            $table->string('c_Emi')->nullable();
            $table->string('c_Source')->nullable();
            $table->string('c_Case_status')->nullable();
            $table->string('c_res_email_sent')->nullable();
            $table->string('c_Welcome_email')->nullable();
            $table->text('c_Sale_Notes')->nullable();
            $table->string('c_Sale_updated_by')->nullable();
            $table->string('c_supremo_Id')->nullable();
            $table->string('c_contact_number')->nullable();
            $table->string('c_Second_contact_number')->nullable();
            $table->string('c_security_answer')->nullable();
            $table->string('c_security_question')->nullable();
            $table->string('c_test')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('newcustomers');
    }
};