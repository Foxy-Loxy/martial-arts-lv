<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models\Eloquent{
/**
 * App\Models\Eloquent\School
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Eloquent\Branch[] $branches
 * @property-read int|null $branches_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Eloquent\School newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Eloquent\School newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Eloquent\School query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Eloquent\School whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Eloquent\School whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Eloquent\School whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Eloquent\School whereUpdatedAt($value)
 */
	class School extends \Eloquent {}
}

namespace App\Models\Eloquent{
/**
 * App\Models\Eloquent\Exam
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon $when
 * @property int|null $branch_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Eloquent\Branch|null $branch
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Eloquent\ExamPass[] $passes
 * @property-read int|null $passes_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Eloquent\Trainee[] $trainees
 * @property-read int|null $trainees_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Eloquent\Exam newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Eloquent\Exam newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Eloquent\Exam query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Eloquent\Exam whereBranchId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Eloquent\Exam whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Eloquent\Exam whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Eloquent\Exam whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Eloquent\Exam whereWhen($value)
 */
	class Exam extends \Eloquent {}
}

namespace App\Models\Eloquent{
/**
 * App\Models\Eloquent\SeminarVisit
 *
 * @property int $id
 * @property int|null $seminar_id
 * @property int|null $trainee_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Eloquent\Seminar|null $seminar
 * @property-read \App\Models\Eloquent\Trainee|null $trainee
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Eloquent\SeminarVisit newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Eloquent\SeminarVisit newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Eloquent\SeminarVisit query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Eloquent\SeminarVisit whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Eloquent\SeminarVisit whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Eloquent\SeminarVisit whereSeminarId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Eloquent\SeminarVisit whereTraineeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Eloquent\SeminarVisit whereUpdatedAt($value)
 */
	class SeminarVisit extends \Eloquent {}
}

namespace App\Models\Eloquent{
/**
 * App\Models\Eloquent\Seminar
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon $when
 * @property string $name
 * @property string $description
 * @property string $protocol
 * @property int|null $branch_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Eloquent\Branch|null $branch
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Eloquent\Seminar newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Eloquent\Seminar newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Eloquent\Seminar query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Eloquent\Seminar whereBranchId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Eloquent\Seminar whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Eloquent\Seminar whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Eloquent\Seminar whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Eloquent\Seminar whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Eloquent\Seminar whereProtocol($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Eloquent\Seminar whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Eloquent\Seminar whereWhen($value)
 */
	class Seminar extends \Eloquent {}
}

namespace App\Models\Eloquent{
/**
 * App\Models\Eloquent\Branch
 *
 * @property int $id
 * @property string $name
 * @property int|null $school_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Eloquent\School|null $school
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Eloquent\Trainer[] $trainers
 * @property-read int|null $trainers_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Eloquent\Branch newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Eloquent\Branch newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Eloquent\Branch query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Eloquent\Branch whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Eloquent\Branch whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Eloquent\Branch whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Eloquent\Branch whereSchoolId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Eloquent\Branch whereUpdatedAt($value)
 */
	class Branch extends \Eloquent {}
}

namespace App\Models\Eloquent{
/**
 * App\Models\Eloquent\Trainer
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $address
 * @property string $title
 * @property string $about
 * @property string $photo
 * @property string $phone
 * @property \Illuminate\Support\Carbon $bday
 * @property int|null $branch_id
 * @property int $level
 * @property string $level_type
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $locale
 * @property-read \App\Models\Eloquent\Branch|null $branch
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Eloquent\Trainee[] $trainees
 * @property-read int|null $trainees_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Eloquent\Trainer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Eloquent\Trainer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Eloquent\Trainer query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Eloquent\Trainer whereAbout($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Eloquent\Trainer whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Eloquent\Trainer whereBday($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Eloquent\Trainer whereBranchId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Eloquent\Trainer whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Eloquent\Trainer whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Eloquent\Trainer whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Eloquent\Trainer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Eloquent\Trainer whereLevel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Eloquent\Trainer whereLevelType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Eloquent\Trainer whereLocale($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Eloquent\Trainer whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Eloquent\Trainer wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Eloquent\Trainer wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Eloquent\Trainer wherePhoto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Eloquent\Trainer whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Eloquent\Trainer whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Eloquent\Trainer whereUpdatedAt($value)
 */
	class Trainer extends \Eloquent {}
}

namespace App\Models\Eloquent{
/**
 * App\Models\Eloquent\ExamPass
 *
 * @property int $id
 * @property int|null $exam_id
 * @property int|null $trainee_id
 * @property string|null $commentary
 * @property string $result
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Eloquent\Exam|null $exam
 * @property-read \App\Models\Eloquent\Trainee|null $trainee
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Eloquent\ExamPass newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Eloquent\ExamPass newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Eloquent\ExamPass query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Eloquent\ExamPass whereCommentary($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Eloquent\ExamPass whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Eloquent\ExamPass whereExamId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Eloquent\ExamPass whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Eloquent\ExamPass whereResult($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Eloquent\ExamPass whereTraineeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Eloquent\ExamPass whereUpdatedAt($value)
 */
	class ExamPass extends \Eloquent {}
}

namespace App\Models\Eloquent{
/**
 * App\Models\Eloquent\Trainee
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property \Illuminate\Support\Carbon $bday
 * @property int $trainer_id
 * @property int $level
 * @property string $level_type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Eloquent\ExamPass[] $examPasses
 * @property-read int|null $exam_passes_count
 * @property-read \App\Models\Eloquent\Trainer $trainer
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Eloquent\Seminar[] $visitedSeminars
 * @property-read int|null $visited_seminars_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Eloquent\Trainee newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Eloquent\Trainee newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Eloquent\Trainee query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Eloquent\Trainee whereBday($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Eloquent\Trainee whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Eloquent\Trainee whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Eloquent\Trainee whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Eloquent\Trainee whereLevel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Eloquent\Trainee whereLevelType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Eloquent\Trainee whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Eloquent\Trainee wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Eloquent\Trainee whereTrainerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Eloquent\Trainee whereUpdatedAt($value)
 */
	class Trainee extends \Eloquent {}
}

