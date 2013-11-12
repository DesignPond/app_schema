<?php

class BoxeController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $boxes = Boxe::all()->toArray();
		
		return Response::json(array(
        	'error' => false,
			'items' => $boxes
			),
		200 );
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function refProject($id){
	
		$boxes = Boxe::where('projet_id', '=', $id)->get()->toArray();
		
		return Response::json(array(
        	'error' => false,
			'items' => $boxes
			),
		200 );
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

		$box = Boxe::create( $newbox );
		return Response::json( array( 'error' => false, 'items' => array('id'=>$box->id)), 200 );
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$box = Boxe::find($id)->toArray();
		
		return Response::json(array(
        	'error' => false,
			'items' => $box
			),
		200 );
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

		$box   = Boxe::find($id);

		$box->topCoord_node  = $updatebox['topCoord_node'];
		$box->leftCoord_node = $updatebox['leftCoord_node'];
		$box->width_node     = $updatebox['width_node'];
		$box->height_node    = $updatebox['height_node'];	
		$box->couleurBg_node = $updatebox['couleurBg_node'];
		$box->text           = $updatebox['text'];
		$box->borderBg_node  = $updatebox['borderBg_node'];
		$box->zindex         = $updatebox['zindex'];
		$box->no_node        = $updatebox['no_node'];
		
		$box->save();
		
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
		Boxe::destroy($id);
		return Response::json(array( 'error' => false ), 200 );
	}

}
