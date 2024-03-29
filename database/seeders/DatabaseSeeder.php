<?php

namespace Database\Seeders;

use App\Http\Controllers\CourseOfferingController;
use App\Models\student;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();


        $this->call([
            DepartmentSeeder::class,
            UserTableSeeder::class,
            SemesterSeeder::class,
            // CourseSeeder::class,
            StudentSeeder::class,
            StudySessionSeeder::class,
            ResultSeeder::class,
            DepartmentStudySessionSeeder::class,
            CourseOfferingSeeder::class,



        ]);



        $sql = "INSERT INTO `courses` (`id`, `course_code`, `title`, `type`, `credit`, `semester_id`, `department_id`, `created_at`, `updated_at`) VALUES
                (1, 'EEE 101', 'lorem ipsum', 1, 3.00, 1, 2, NULL, NULL),
                (2, 'EEE 102', 'lorem ipsum (Sessional) ', 2, 1.50, 1, 2, NULL, NULL),
                (3, 'EEE 201', 'lorem ipsum', 1, 3.00, 2, 2, NULL, NULL),
                (4, 'EEE 202', 'lorem ipsum (Sessional) ', 2, 1.50, 2, 2, NULL, NULL),
                (5, 'EEE 301', 'EEE 301', 1, 3.00, 3, 2, '2021-12-21 00:38:27', '2021-12-21 00:38:27'),
                (6, 'EEE 302', 'EEE 302', 2, 2.00, 3, 2, '2021-12-21 00:38:44', '2021-12-21 00:38:44'),
                (7, 'EEE 303', 'EEE 302', 1, 3.00, 3, 2, '2021-12-21 00:38:54', '2021-12-21 00:38:54'),
                (8, 'EEE 304', 'EEE 304', 2, 2.00, 3, 2, '2021-12-21 00:39:11', '2021-12-21 00:39:11'),
                (9, 'EEE 401', 'EEE 401', 1, 3.00, 4, 2, '2021-12-21 00:39:36', '2021-12-21 00:39:36'),
                (10, 'EEE 403', 'EEE 403', 1, 3.00, 4, 2, '2021-12-21 00:39:48', '2021-12-21 00:39:48'),
                (11, 'EEE 404', 'EEE 404', 1, 3.00, 4, 2, '2021-12-21 00:40:05', '2021-12-21 00:40:05'),
                (12, 'EEE 501', 'EEE 501', 1, 3.00, 5, 2, '2021-12-21 00:40:31', '2021-12-21 00:40:31'),
                (13, 'EEE 502', 'EEE 502', 1, 3.00, 5, 2, '2021-12-21 00:40:43', '2021-12-21 00:40:43'),
                (14, 'EEE 503', 'EEE 503', 1, 3.00, 5, 2, '2021-12-21 00:40:56', '2021-12-21 00:40:56'),
                (15, 'EEE 505', 'EEE 505', 1, 3.00, 5, 2, '2021-12-21 00:41:09', '2021-12-21 00:41:09'),
                (16, 'EEE 601', 'EEE 601', 1, 3.00, 6, 2, '2021-12-21 00:41:34', '2021-12-21 00:41:34'),
                (17, 'EEE 602', 'EEE 602', 1, 3.00, 6, 2, '2021-12-21 00:41:45', '2021-12-21 00:41:45'),
                (18, 'EEE 603', 'EEE 603', 1, 3.00, 6, 2, '2021-12-21 00:41:54', '2021-12-21 00:41:54'),
                (19, 'EEE 701', 'EEE 701', 1, 3.00, 7, 2, '2021-12-21 00:42:34', '2021-12-21 00:42:34'),
                (20, 'EEE 702', 'EEE 702', 1, 3.00, 7, 2, '2021-12-21 00:42:44', '2021-12-21 00:42:44'),
                (21, 'EEE 703', 'EEE 703', 1, 3.00, 7, 2, '2021-12-21 00:42:57', '2021-12-21 00:42:57'),
                (22, 'EEE 801', 'EEE 801', 1, 3.00, 8, 2, '2021-12-21 00:43:20', '2021-12-21 00:43:20'),
                (23, 'EEE 802', 'EEE 802', 1, 3.00, 8, 2, '2021-12-21 00:43:32', '2021-12-21 00:43:32'),
                (24, 'EEE 803', 'EEE 803', 1, 3.00, 8, 2, '2021-12-21 00:43:43', '2021-12-21 00:43:43'),
                (25, 'EEE 804', 'EEE 804', 1, 3.00, 8, 2, '2021-12-21 00:43:57', '2021-12-21 00:43:57');
                ";
        DB::select($sql);
        $sql =
            "INSERT INTO `session_semester_courses` (`id`, `session_id`, `department_id`, `semester_id`, `course_id`, `is_active`, `created_at`, `updated_at`) VALUES
            (1, 1, 2, 1, 1, 1, '2021-12-10 21:05:13', '2021-12-10 21:06:01'),
            (2, 1, 2, 1, 2, 1, '2021-12-10 21:05:13', '2021-12-10 21:05:59'),
            (3, 1, 2, 2, 3, 1, '2021-12-21 00:50:07', '2021-12-21 00:50:31'),
            (4, 1, 2, 2, 4, 1, '2021-12-21 00:50:07', '2021-12-21 00:50:36'),
            (5, 1, 2, 3, 5, 1, '2021-12-21 00:50:21', '2021-12-21 00:51:29'),
            (6, 1, 2, 3, 6, 1, '2021-12-21 00:50:22', '2021-12-21 00:51:22'),
            (7, 1, 2, 3, 7, 1, '2021-12-21 00:50:22', '2021-12-21 00:51:15'),
            (8, 1, 2, 3, 8, 1, '2021-12-21 00:50:22', '2021-12-21 00:50:42'),
            (9, 1, 2, 4, 9, 1, '2021-12-21 00:50:23', '2021-12-21 00:51:38'),
            (10, 1, 2, 4, 10, 1, '2021-12-21 00:50:23', '2021-12-21 00:51:34'),
            (11, 1, 2, 4, 11, 1, '2021-12-21 00:50:23', '2021-12-21 00:50:43'),
            (12, 1, 2, 5, 12, 1, '2021-12-21 00:50:23', '2021-12-21 00:51:44'),
            (13, 1, 2, 5, 13, 1, '2021-12-21 00:50:23', '2021-12-21 00:51:47'),
            (14, 1, 2, 5, 14, 1, '2021-12-21 00:50:24', '2021-12-21 00:51:52'),
            (15, 1, 2, 5, 15, 1, '2021-12-21 00:50:24', '2021-12-21 00:50:58'),
            (16, 1, 2, 6, 16, 1, '2021-12-21 00:50:24', '2021-12-21 00:52:07'),
            (17, 1, 2, 6, 17, 1, '2021-12-21 00:50:24', '2021-12-21 00:52:03'),
            (18, 1, 2, 6, 18, 1, '2021-12-21 00:50:24', '2021-12-21 00:51:00'),
            (19, 1, 2, 7, 19, 1, '2021-12-21 00:50:25', '2021-12-21 00:52:13'),
            (20, 1, 2, 7, 20, 1, '2021-12-21 00:50:25', '2021-12-21 00:52:17'),
            (21, 1, 2, 7, 21, 1, '2021-12-21 00:50:25', '2021-12-21 00:51:00'),
            (22, 1, 2, 8, 22, 1, '2021-12-21 00:50:26', '2021-12-21 00:52:55'),
            (23, 1, 2, 8, 23, 1, '2021-12-21 00:50:26', '2021-12-21 00:52:30'),
            (24, 1, 2, 8, 24, 1, '2021-12-21 00:50:26', '2021-12-21 00:52:24'),
            (25, 1, 2, 8, 25, 1, '2021-12-21 00:50:26', '2021-12-21 00:55:15');";
        DB::select($sql);


        $sql =
            "INSERT INTO `course_offerings` (`id`, `session_id`, `department_id`, `semester_id`, `is_open`, `created_at`, `updated_at`) VALUES
         (1, 1, 2, 1, 1, '2021-12-11 03:17:07', '2021-12-11 03:17:12'),
         (2, 1, 2, 2, 0, '2021-12-11 03:17:07', '2021-12-11 03:17:07'),
         (3, 1, 2, 3, 0, '2021-12-11 03:17:07', '2021-12-11 03:17:07'),
         (4, 1, 2, 4, 0, '2021-12-11 03:17:07', '2021-12-11 03:17:07'),
         (5, 1, 2, 5, 0, '2021-12-11 03:17:07', '2021-12-11 03:17:07'),
         (6, 1, 2, 6, 0, '2021-12-11 03:17:07', '2021-12-11 03:17:07'),
         (7, 1, 2, 7, 0, '2021-12-11 03:17:07', '2021-12-11 03:17:07'),
         (8, 1, 2, 8, 0, '2021-12-11 03:17:07', '2021-12-11 03:17:07'),
         (9, 2, 2, 1, 0, '2021-12-11 03:17:07', '2021-12-11 03:17:07'),
         (10, 2, 2, 2, 0, '2021-12-11 03:17:07', '2021-12-11 03:17:07'),
         (11, 2, 2, 3, 0, '2021-12-11 03:17:07', '2021-12-11 03:17:07'),
         (12, 2, 2, 4, 0, '2021-12-11 03:17:07', '2021-12-11 03:17:07'),
         (13, 2, 2, 5, 0, '2021-12-11 03:17:07', '2021-12-11 03:17:07'),
         (14, 2, 2, 6, 0, '2021-12-11 03:17:07', '2021-12-11 03:17:07'),
         (15, 2, 2, 7, 0, '2021-12-11 03:17:07', '2021-12-11 03:17:07'),
         (16, 2, 2, 8, 0, '2021-12-11 03:17:07', '2021-12-11 03:17:07'),
         (17, 3, 2, 1, 0, '2021-12-11 03:17:07', '2021-12-11 03:17:07'),
         (18, 3, 2, 2, 0, '2021-12-11 03:17:08', '2021-12-11 03:17:08'),
         (19, 3, 2, 3, 0, '2021-12-11 03:17:08', '2021-12-11 03:17:08'),
         (20, 3, 2, 4, 0, '2021-12-11 03:17:08', '2021-12-11 03:17:08'),
         (21, 3, 2, 5, 0, '2021-12-11 03:17:08', '2021-12-11 03:17:08'),
         (22, 3, 2, 6, 0, '2021-12-11 03:17:08', '2021-12-11 03:17:08'),
         (23, 3, 2, 7, 0, '2021-12-11 03:17:08', '2021-12-11 03:17:08'),
         (24, 3, 2, 8, 0, '2021-12-11 03:17:08', '2021-12-11 03:17:08'),
         (25, 4, 2, 1, 0, '2021-12-11 03:17:08', '2021-12-11 03:17:08'),
         (26, 4, 2, 2, 0, '2021-12-11 03:17:08', '2021-12-11 03:17:08'),
         (27, 4, 2, 3, 0, '2021-12-11 03:17:08', '2021-12-11 03:17:08'),
         (28, 4, 2, 4, 0, '2021-12-11 03:17:08', '2021-12-11 03:17:08'),
         (29, 4, 2, 5, 0, '2021-12-11 03:17:08', '2021-12-11 03:17:08'),
         (30, 4, 2, 6, 0, '2021-12-11 03:17:08', '2021-12-11 03:17:08'),
         (31, 4, 2, 7, 0, '2021-12-11 03:17:08', '2021-12-11 03:17:08'),
         (32, 4, 2, 8, 0, '2021-12-11 03:17:08', '2021-12-11 03:17:08'),
         (33, 5, 2, 1, 0, '2021-12-11 03:17:08', '2021-12-11 03:17:08'),
         (34, 5, 2, 2, 0, '2021-12-11 03:17:08', '2021-12-11 03:17:08'),
         (35, 5, 2, 3, 0, '2021-12-11 03:17:08', '2021-12-11 03:17:08'),
         (36, 5, 2, 4, 0, '2021-12-11 03:17:08', '2021-12-11 03:17:08'),
         (37, 5, 2, 5, 0, '2021-12-11 03:17:08', '2021-12-11 03:17:08'),
         (38, 5, 2, 6, 0, '2021-12-11 03:17:08', '2021-12-11 03:17:08'),
         (39, 5, 2, 7, 0, '2021-12-11 03:17:08', '2021-12-11 03:17:08'),
         (40, 5, 2, 8, 0, '2021-12-11 03:17:08', '2021-12-11 03:17:08'),
         (41, 6, 2, 1, 0, '2021-12-11 03:17:08', '2021-12-11 03:17:08'),
         (42, 6, 2, 2, 0, '2021-12-11 03:17:08', '2021-12-11 03:17:08'),
         (43, 6, 2, 3, 0, '2021-12-11 03:17:08', '2021-12-11 03:17:08'),
         (44, 6, 2, 4, 0, '2021-12-11 03:17:08', '2021-12-11 03:17:08'),
         (45, 6, 2, 5, 0, '2021-12-11 03:17:08', '2021-12-11 03:17:08'),
         (46, 6, 2, 6, 0, '2021-12-11 03:17:08', '2021-12-11 03:17:08'),
         (47, 6, 2, 7, 0, '2021-12-11 03:17:08', '2021-12-11 03:17:08'),
         (48, 6, 2, 8, 0, '2021-12-11 03:17:08', '2021-12-11 03:17:08');";
        DB::select($sql);

      
    }
}
