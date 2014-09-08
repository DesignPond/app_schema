<?php

use  Schema\Compose\Repo\BoxeInterface;

class BoxeController extends BaseController {

    protected $boxe;

    // Class expects an Eloquent model
    public function __construct(BoxeInterface $boxe)
    {
        $this->boxe = $boxe;
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $boxes = $this->boxe->getAll()->toArray();
		
		return Response::json(array(
        	'error' => false,
			'items' => $boxes
			),200 );
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function refProject($id){
	
		$boxes = $this->boxe->getByProject($id)->toArray();
		
		return Response::json(array(
        	'error' => false,
			'items' => $boxes
			),200 );
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input  = Input::all();
		$new    = $input['model'];
		$newbox = json_decode($new, true);

		$box = $this->boxe->create( $newbox );

		return Response::json( array( 'error' => false, 'items' => array('id'=> $box->id )), 200 );
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$box = $this->boxe->find($id)->toArray();
		
		return Response::json(array(
        	'error' => false,
			'items' => $box
			),200 );
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$input     = Input::all();
		$new       = $input['model'];
		$updatebox = json_decode($new, true);

        $box = array('id' => $id) + $updatebox;

        $this->boxe->update($box);
		
		return Response::json(array( 'error' => false , 'data' => $updatebox ), 200 );
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->boxe->delete($id);

		return Response::json(array( 'error' => false ), 200 );
	}

}
