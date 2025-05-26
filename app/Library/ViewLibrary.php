<?php


namespace App\Library;

class ViewLibrary
{
    public function viewL(string $page = 'home', array $data = [], array $options = [])
    {

        //dd(resource_path() . '/views/' . $page . '.blade.php');
        if (! is_file(resource_path() . '/views/' . $page . '.blade.php')) {
            // Whoops, we don't have a page for that!
            abort(404);
            //throw new PageNotFoundException($page);
        }

        //$data['title'] = ucfirst($page); // Capitalize the first letter
        //function view(string $name, array $data = [], array $options = []): string { }
        return view($page, $data, $options);
    }

    public function test()
    {
        return 'test';
    }
}
