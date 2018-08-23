<?php

namespace App\Http\Controllers;

use App\Handlers\ImageUploadHandler;
use App\Models\Category;
use App\Models\Topic;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\TopicRequest;

class TopicsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show','upload_image']]);
    }

	public function index(Request $request,Topic $topic)
	{
	    //$http = new \GuzzleHttp\Client();
	    //$ret = $http->get("http://www.baidu.com");
	    //print_r($ret->getBody());
	    //预加载
		$topics = $topic->withOrder($request->order)->paginate(30);
		return view('topics.index', compact('topics'));

//        $faker = \Faker\Factory::create('zh_CN');
//        for ($i=0; $i < 10; $i++) {
//
//            //print_r($faker->sentences())."<br />";
//            echo $faker->valid()->address."<br />";
//        }

	}

	public function upload_image(Request $request,ImageUploadHandler $upload)
    {
        $data = [
            'success'   => false,
            'msg'       => '上传失败!',
            'file_path' => ''
        ];

        if($request->upload_file){

            $result = $upload->save($request->upload_file,'topics',\Auth::id());
            if($result){
                $data['success'] = true;
                $data['msg'] = 'upload success';
                $data['file_path'] = $result['path'];
            }
        }

        return $data;
    }
    public function show(Topic $topic)
    {
        return view('topics.show', compact('topic'));
    }

	public function create(Topic $topic)
	{
	    $categories = Category::all();
		return view('topics.create_and_edit', compact('topic','categories'));
	}

	public function store(TopicRequest $request,Topic $topic)
	{
		//$topic = Topic::create($request->all());
        $topic = $topic->fill($request->all());
        $topic->user_id = \Auth::id();
        $topic->save();
		return redirect()->route('topics.show', $topic->id)->with('message', 'Created successfully.');
	}

	public function edit(Topic $topic)
	{
        $this->authorize('update', $topic);
        $categories = Category::all();
		return view('topics.create_and_edit', compact('topic','categories'));
	}

	public function update(TopicRequest $request, Topic $topic)
	{
		$this->authorize('update', $topic);
		$topic->update($request->all());

		return redirect()->route('topics.show', $topic->id)->with('message', 'Updated successfully.');
	}

	public function destroy(Topic $topic)
	{
		$this->authorize('destroy', $topic);
		$topic->delete();

		return redirect()->route('topics.index')->with('message', 'Deleted successfully.');
	}
}