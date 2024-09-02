<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Muhamad Affan Akmal',
            'username' => 'maffanakmal',
            'email' => 'apang@gmail.com',
            'password' => bcrypt('12345'),
        ]);

        User::factory(5)->create();

        Category::create([
            'name' => 'Programming',
            'slug' => 'programming',
        ]);
        
        Category::create([
            'name' => 'Personal',
            'slug' => 'personal',
        ]);

        Category::create([
            'name' => 'Design',
            'slug' => 'design',
        ]);
        
        Category::create([
            'name' => '3D Models',
            'slug' => '3dmodels',
        ]);

        Post::factory(20)->create();
        
        // User::create([
        //     'name' => 'Olivia Rizki',
        //     'email' => 'olipiah@gmail.com',
        //     'password' => bcrypt('12345'),
        // ]);


        // Post::create([
        //     'title' => 'My First Post',
        //     'category_id' => 1,
        //     'user_id' => 1,
        //     'slug' => 'first-post-affan',
        //     'excerpt' => 'This is my first blog post.',
        //     'body' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus adipisci accusantium voluptates numquam mollitia ipsam maxime voluptatem modi quaerat nesciunt, ab officia tenetur illo sapiente molestias iste corrupti quisquam facere natus inventore nemo illum minima. Explicabo omnis corporis recusandae alias dolore vitae voluptate similique totam. Aperiam possimus qui tenetur corrupti velit quasi illo veniam voluptates labore, tempora voluptatibus fugiat cupiditate error ut ullam repudiandae? Eius ad incidunt dignissimos fuga hic sunt quasi modi.</p><p>Itaque in ratione necessitatibus accusantium delectus, ea deleniti accusamus rerum aut rem laboriosam temporibus vero, dolorem excepturi facilis voluptas consequatur eveniet debitis? Illum hic iure numquam. In nemo ab illo nihil voluptatibus veniam voluptatem, saepe aut sed sunt laborum, placeat nesciunt, quas rem eligendi quasi nisi impedit? Nostrum repudiandae quam dicta magnam ullam, laudantium adipisci commodi iusto reprehenderit cumque, libero velit mollitia quisquam architecto cum aliquam illo sed quod? Blanditiis, sed eveniet! Dolores sed molestiae libero dolorum.</p>',
        // ]);

        // Post::create([
        //     'title' => 'My First Post',
        //     'category_id' => 2,
        //     'user_id' => 2,
        //     'slug' => 'first-post-olivia',
        //     'excerpt' => 'This is my first blog post.',
        //     'body' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus adipisci accusantium voluptates numquam mollitia ipsam maxime voluptatem modi quaerat nesciunt, ab officia tenetur illo sapiente molestias iste corrupti quisquam facere natus inventore nemo illum minima. Explicabo omnis corporis recusandae alias dolore vitae voluptate similique totam. Aperiam possimus qui tenetur corrupti velit quasi illo veniam voluptates labore, tempora voluptatibus fugiat cupiditate error ut ullam repudiandae? Eius ad incidunt dignissimos fuga hic sunt quasi modi.</p><p>Itaque in ratione necessitatibus accusantium delectus, ea deleniti accusamus rerum aut rem laboriosam temporibus vero, dolorem excepturi facilis voluptas consequatur eveniet debitis? Illum hic iure numquam. In nemo ab illo nihil voluptatibus veniam voluptatem, saepe aut sed sunt laborum, placeat nesciunt, quas rem eligendi quasi nisi impedit? Nostrum repudiandae quam dicta magnam ullam, laudantium adipisci commodi iusto reprehenderit cumque, libero velit mollitia quisquam architecto cum aliquam illo sed quod? Blanditiis, sed eveniet! Dolores sed molestiae libero dolorum.</p>',
        // ]);

        // Post::create([
        //     'title' => 'My Second Post',
        //     'category_id' => 1,
        //     'user_id' => 1,
        //     'slug' => 'second-post',
        //     'excerpt' => 'This is my second blog post.',
        //     'body' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus adipisci accusantium voluptates numquam mollitia ipsam maxime voluptatem modi quaerat nesciunt, ab officia tenetur illo sapiente molestias iste corrupti quisquam facere natus inventore nemo illum minima. Explicabo omnis corporis recusandae alias dolore vitae voluptate similique totam. Aperiam possimus qui tenetur corrupti velit quasi illo veniam voluptates labore, tempora voluptatibus fugiat cupiditate error ut ullam repudiandae? Eius ad incidunt dignissimos fuga hic sunt quasi modi.</p><p>Itaque in ratione necessitatibus accusantium delectus, ea deleniti accusamus rerum aut rem laboriosam temporibus vero, dolorem excepturi facilis voluptas consequatur eveniet debitis? Illum hic iure numquam. In nemo ab illo nihil voluptatibus veniam voluptatem, saepe aut sed sunt laborum, placeat nesciunt, quas rem eligendi quasi nisi impedit? Nostrum repudiandae quam dicta magnam ullam, laudantium adipisci commodi iusto reprehenderit cumque, libero velit mollitia quisquam architecto cum aliquam illo sed quod? Blanditiis, sed eveniet! Dolores sed molestiae libero dolorum.</p>',
        // ]);

    }
}
