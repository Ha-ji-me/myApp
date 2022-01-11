<?php

namespace Tests\Feature\Controller;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Symfony\Component\HttpFoundation\Response;
use App\Models\User;
use App\Models\IncidentPost;
use Tests\TestCase;

class IncidentPostControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /** @var string */
    private $guard = 'web';

    /** @var User */
    private $authUser;

    /**
     * コメントを読んだら消すこと
     * @note setUp関数内ではテストに必要な部品を作成する場所
     * 主にデータを構築する場所
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->seed();

        $this->authUser = User::create([
            'name' => 'hoge',
            'email' => 'test@example.com',
            'password' => 'password',
        ]);
    }

    /**
     * @group incident_post_controller_store_test
     * @group api_incident_post_nominal
     * @note 一般的に英語のテキストが関数名になるが、テストはわかりづらいため、日本語で作成するケースがある
     */
    public function test_incident_post_store()
    {
        $response = $this->actingAs($this->authUser, $this->guard)
            ->post(route(
                'incident-post.store',
                $this->dummyData()
            ));

        $response->assertStatus(Response::HTTP_FOUND);
    }

    //* ダミーデータを生成する
    private function dummyData(): array
    {
        return [
            'title' => 'test tilte',
            'body' => 'test body',
        ];
    }
}
