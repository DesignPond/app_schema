<?php

use  Schema\Compose\Repo\ArrowInterface;

class ArrowController extends BaseController {

    protected $arrow;

    // Class expects an Eloquent model
    public function __construct( ArrowInterface $arrow )
    {
        $this->arrow = $arrow;
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$arrows = $this->arrow->getAll()->toArray();
		
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
	
		$arrows = $this->arrow->getByProject($id)->toArray();
		
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

		$arrow = $this->arrow->create( $newarrow );
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
		$arrow = $this->arrow->find($id)->toArray();
		
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

        $arrow = array('id' => $id) + $updatearrow;

        $this->arrow->update($arrow);
		
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
        $this->arrow->delete($id);
		return Response::json(array( 'error' => false ), 200 );
	}

}
