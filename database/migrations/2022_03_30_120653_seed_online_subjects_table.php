<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SeedOnlineSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('groups', function (Blueprint $table) {
            $groups = [
                [
                    'id' => 1,
                    'name' => 'Science',
                ],
                [
                    'id' => 2,
                    'name' => 'Commerce',
                ],
                [
                    'id' => 3,
                    'name' => 'Humanities',
                ],

            ];

            foreach ($groups as $gp){
                \App\Models\Backend\Group::create([
                    'id' => $gp['id'],
                    'name' => $gp['name']
                ]);
            }
        });
        Schema::table('online_subjects', function (Blueprint $table) {
            $online_subject = [
                    [
                        'code' => 101,
                        'code2' => 102,
                        'name' => 'Bangle',
                        'type' => 1,
                        'group_id' => null,
                    ],
                    [
                        'code' => 107,
                        'code2' => 108,
                        'name' => 'English',
                        'type' => 1,
                        'group_id' => null,
                    ],
                    [
                        'code' => 275,
                        'code2' => '',
                        'name' => 'ICT',
                        'type' => 1,
                        'group_id' => null,
                    ],
                    [
                        'code' => 174,
                        'code2' => 175,
                        'name' => 'Physics',
                        'type' => 2,
                        'group_id' => 1,
                    ],
                    [
                        'code' => 176,
                        'code2' => 177,
                        'name' => 'Chemistry',
                        'type' => 2,
                        'group_id' => 1,
                    ],
                    [
                        'code' => 178,
                        'code2' => 179,
                        'name' => 'Biology',
                        'type' => 23,
                        'group_id' => 1,
                    ],
                    [
                        'code' => 265,
                        'code2' => 266,
                        'name' => 'Higher Math',
                        'type' => 23,
                        'group_id' => 1,
                    ],
                    [
                        'code' => 253,
                        'code2' => 254,
                        'name' => 'Accounting',
                        'type' => 2,
                        'group_id' => 2,
                    ],
                    [
                        'code' => 277,
                        'code2' => 278,
                        'name' => 'Business Organization & Management',
                        'type' => 2,
                        'group_id' => 2,
                    ],
                    [
                        'code' => 292,
                        'code2' => 293,
                        'name' => 'Finance, Banking & Insurance',
                        'type' => 2,
                        'group_id' => 2,
                    ],
                    [
                        'code' => 109,
                        'code2' => 110,
                        'name' => 'Economics',
                        'type' => 3,
                        'group_id' => 2,
                    ],
                    [
                        'code' => 129,
                        'code2' => 130,
                        'name' => 'Statistics',
                        'type' => 3,
                        'group_id' => 2,
                    ],
                    [
                        'code' => 269,
                        'code2' => 270,
                        'name' => 'Civic & Good Govern',
                        'type' => 23,
                        'group_id' => 3,
                    ],
                    [
                        'code' => 117,
                        'code2' => 118,
                        'name' => 'Social Science',
                        'type' => 23,
                        'group_id' => 3,
                    ],
                    [
                        'code' => 267,
                        'code2' => 268,
                        'name' => 'Islamic History and culture',
                        'type' => 23,
                        'group_id' => 3,
                    ],
                    [
                        'code' => 304,
                        'code2' => 305,
                        'name' => 'General History',
                        'type' => 23,
                        'group_id' => 3,
                    ],
                    [
                        'code' => 121,
                        'code2' => 122,
                        'name' => 'Logic',
                        'type' => 23,
                        'group_id' => 1,
                    ],
                    [
                        'code' => 249,
                        'code2' => 250,
                        'name' => 'Islamic Studies',
                        'type' => 3,
                        'group_id' => 3,
                    ],
                    [
                        'code' => 139,
                        'code2' => 140,
                        'name' => 'Pali',
                        'type' => 3,
                        'group_id' => 4,
                    ],
                    [
                        'code' => 109,
                        'code2' => 110,
                        'name' => 'Economics',
                        'type' => 3,
                        'group_id' => 8,
                    ],
                    [
                        'code' => 129,
                        'code2' => 130,
                        'name' => 'Statistics',
                        'type' => 3,
                        'group_id' => 8,
                    ],

                ];

                foreach ($online_subject as $os){
                    \App\Models\Backend\OnlineSubject::updateOrCreate([
                        'code' => $os['code'],
                        'code2' => $os['code2'],
                        'name' => $os['name'],
                        'type' => $os['type'],
                        'group_id' => $os['group_id'],
                    ]);
                }
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
