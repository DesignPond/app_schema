<?php

class ArrowController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$arrows = Arrow::all()->toArray();
		
		return Response::json(array(
        	'error' => false,
			'items' => $arrows
			),
		200 );
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function refProject($id){
	
		$arrows = Arrow::where('refProjet', '=', $id)->get()->toArray();
		
		return Response::json(array(
        	'error' => false,
			'items' => $arrows
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
		$input    = Input::all();
		$new      = $input['model'];
		$newarrow = json_decode($new, true);

		$arrow = Arrow::create( $newarrow );
		return Response::json( array( 'error' => false, 'items' => array('id'=>$arrow->id)), 200 );
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$arrow = Arrow::find($id)->toArray();
		
		return Response::json(array(
        	'error' => false,
			'items' => $arrow
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
		$input       = Input::all();
		$new         = $input['model'];
		$updatearrow = json_decode($new, true);

		$arrow  = Arrow::find($id);

		$arrow->topCoord_arrow  = $updatearrow['topCoord_arrow'];
		$arrow->leftCoord_arrow = $updatearrow['leftCoord_arrow'];
		$arrow->couleurBg_arrow = $updatearrow['couleurBg_arrow'];
		$arrow->no_arrow        = $updatearrow['no_arrow'];
		$arrow->position        = $updatearrow['position'];
		
		$arrow->save();
		
		return Response::json(array( 'error' => false , 'data' => $updatearrow ), 200 );
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Arrow::destroy($id);
		return Response::json(array( 'error' => false ), 200 );
	}

}
