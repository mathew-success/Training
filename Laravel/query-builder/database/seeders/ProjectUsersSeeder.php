<?php

namespace Database\Seeders;

use App\Models\ProjectUser;
use Illuminate\Database\Seeder;

class ProjectUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $projects = [
            [
                'user_id' => 2,
                'project_id' => 1,
                'workspace_id' => 1,
                'organization_id' => 1
            ],
            [
                'user_id' => 2,
                'project_id' => 2,
                'workspace_id' => 1,
                'organization_id' => 1
            ],
            [
                'user_id' => 2,
                'project_id' => 3,
                'workspace_id' => 1,
                'organization_id' => 1
            ],
            [
                'user_id' => 3,
                'project_id' => 4,
                'workspace_id' => 1,
                'organization_id' => 1
            ],
            [
                'user_id' => 3,
                'project_id' => 5,
                'workspace_id' => 1,
                'organization_id' => 1
            ],
            [
                'user_id' => 3,
                'project_id' => 6,
                'workspace_id' => 1,
                'organization_id' => 1
            ],
            [
                'user_id' => 4,
                'project_id' => 7,
                'workspace_id' => 1,
                'organization_id' => 1
            ],
            [
                'user_id' => 4,
                'project_id' => 8,
                'workspace_id' => 1,
                'organization_id' => 1
            ],
            [
                'user_id' => 5,
                'project_id' => 9,
                'workspace_id' => 1,
                'organization_id' => 1
            ],
            [
                'user_id' => 11,
                'project_id' => 10,
                'workspace_id' => 2,
                'organization_id' => 1
            ],
            [
                'user_id' => 11,
                'project_id' => 11,
                'workspace_id' => 2,
                'organization_id' => 1
            ],
            [
                'user_id' => 11,
                'project_id' => 12,
                'workspace_id' => 2,
                'organization_id' => 1
            ],
            [
                'user_id' => 12,
                'project_id' => 13,
                'workspace_id' => 2,
                'organization_id' => 1
            ],
            [
                'user_id' => 12,
                'project_id' => 14,
                'workspace_id' => 2,
                'organization_id' => 1
            ],
            [
                'user_id' => 12,
                'project_id' => 15,
                'workspace_id' => 2,
                'organization_id' => 1
            ],
            [
                'user_id' => 13,
                'project_id' => 16,
                'workspace_id' => 2,
                'organization_id' => 1
            ],
            [
                'user_id' => 13,
                'project_id' => 17,
                'workspace_id' => 2,
                'organization_id' => 1
            ],
            [
                'user_id' => 14,
                'project_id' => 18,
                'workspace_id' => 2,
                'organization_id' => 1
            ],
            [
                'user_id' => 15,
                'project_id' => 19,
                'workspace_id' => 1,
                'organization_id' => 2
            ],
            [
                'user_id' => 15,
                'project_id' => 20,
                'workspace_id' => 1,
                'organization_id' => 2
            ],
            [
                'user_id' => 15,
                'project_id' => 21,
                'workspace_id' => 1,
                'organization_id' => 2
            ],
            [
                'user_id' => 16,
                'project_id' => 22,
                'workspace_id' => 1,
                'organization_id' => 2
            ],
            [
                'user_id' => 16,
                'project_id' => 23,
                'workspace_id' => 1,
                'organization_id' => 2
            ],
            [
                'user_id' => 16,
                'project_id' => 24,
                'workspace_id' => 1,
                'organization_id' => 2
            ],
            [
                'user_id' => 17,
                'project_id' => 25,
                'workspace_id' => 1,
                'organization_id' => 2
            ],
            [
                'user_id' => 17,
                'project_id' => 26,
                'workspace_id' => 1,
                'organization_id' => 2
            ],
            [
                'user_id' => 18,
                'project_id' => 27,
                'workspace_id' => 1,
                'organization_id' => 2
            ],
        ];

        ProjectUser::insert($projects);
    }
}
