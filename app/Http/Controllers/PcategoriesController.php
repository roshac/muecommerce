<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePcategoriesRequest;
use App\Http\Requests\UpdatePcategoriesRequest;
use App\Repositories\PcategoriesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class PcategoriesController extends AppBaseController
{
    /** @var  PcategoriesRepository */
    private $pcategoriesRepository;

    public function __construct(PcategoriesRepository $pcategoriesRepo)
    {
        $this->pcategoriesRepository = $pcategoriesRepo;
    }

    /**
     * Display a listing of the Pcategories.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $pcategories = $this->pcategoriesRepository->all();

        return view('pcategories.index')
            ->with('pcategories', $pcategories);
    }

    /**
     * Show the form for creating a new Pcategories.
     *
     * @return Response
     */
    public function create()
    {
        return view('pcategories.create');
    }

    /**
     * Store a newly created Pcategories in storage.
     *
     * @param CreatePcategoriesRequest $request
     *
     * @return Response
     */
    public function store(CreatePcategoriesRequest $request)
    {
        $input = $request->all();

        $pcategories = $this->pcategoriesRepository->create($input);

        Flash::success('Pcategories saved successfully.');

        return redirect(route('pcategories.index'));
    }

    /**
     * Display the specified Pcategories.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $pcategories = $this->pcategoriesRepository->find($id);

        if (empty($pcategories)) {
            Flash::error('Pcategories not found');

            return redirect(route('pcategories.index'));
        }

        return view('pcategories.show')->with('pcategories', $pcategories);
    }

    /**
     * Show the form for editing the specified Pcategories.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $pcategories = $this->pcategoriesRepository->find($id);

        if (empty($pcategories)) {
            Flash::error('Pcategories not found');

            return redirect(route('pcategories.index'));
        }

        return view('pcategories.edit')->with('pcategories', $pcategories);
    }

    /**
     * Update the specified Pcategories in storage.
     *
     * @param int $id
     * @param UpdatePcategoriesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePcategoriesRequest $request)
    {
        $pcategories = $this->pcategoriesRepository->find($id);

        if (empty($pcategories)) {
            Flash::error('Pcategories not found');

            return redirect(route('pcategories.index'));
        }

        $pcategories = $this->pcategoriesRepository->update($request->all(), $id);

        Flash::success('Pcategories updated successfully.');

        return redirect(route('pcategories.index'));
    }

    /**
     * Remove the specified Pcategories from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $pcategories = $this->pcategoriesRepository->find($id);

        if (empty($pcategories)) {
            Flash::error('Pcategories not found');

            return redirect(route('pcategories.index'));
        }

        $this->pcategoriesRepository->delete($id);

        Flash::success('Pcategories deleted successfully.');

        return redirect(route('pcategories.index'));
    }
}
