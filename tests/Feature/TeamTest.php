<?php

namespace Tests\Feature;

use App\Team;
use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TeamTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function a_team_has_a_name()
    {
        $team = new Team(['name' => 'Laravist']);

        $this->assertEquals('Laravist', $team->name);
    }

    /**
     * @test
     */
    public function a_team_can_add_members()
    {
        $team = factory(Team::class)->create();

        $user = factory(User::class)->create();
        $userTwo = factory(User::class)->create();

        $team->add($user);
        $team->add($userTwo);

        $this->assertEquals(2, $team->count());
    }

    /**
     * @test
     */
    public function a_team_has_a_maxnum_size()
    {
        $team = factory(Team::class)->create(['size' => 2]);

        $user = factory(User::class)->create();
        $userTwo = factory(User::class)->create();
        $userThree = factory(User::class)->create();

        $team->add($user);
        $team->add($userTwo);


        $this->expectException('Exception');
        $team->add($userThree);
    }

    /**
     * @test
     */
    public function a_team_can_remove_a_member()
    {
        $team = factory(Team::class)->create(['size' => 5]);
        $users = factory(User::class, 2)->create();

        $team->add($users);

        $team->remove($users->first());

        $this->assertEquals(1, $team->count());
    }
    
    /**
     * @test
     */
    public function a_team_can_remove_more_than_on_user_at_once()
    {
        $team = factory(Team::class)->create(['size' => 5]);
        $users = factory(User::class, 3)->create();

        $team->add($users);

        $team->remove($users->take(2));

        $this->assertEquals(1, $team->count());
    }

    /**
     * @test
     */
    public function a_team_can_remove_all_member_at_once()
    {
        $team = factory(Team::class)->create(['size' => 5]);
        $users = factory(User::class, 2)->create();

        $team->add($users);

        $team->resize();

        $this->assertEquals(0, $team->count());
    }
    
    /**
     * @test
     */
    public function fix_bug_on_a_team_add_more_than_one_user_at_once()
    {
        $team = factory(Team::class)->create(['size' => 3]);

        $users = factory(User::class, 5)->create();

        $this->expectException('Exception');

        $team->add($users);
    }
}
