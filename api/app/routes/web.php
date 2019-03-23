<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

/** @var Laravel\Lumen\Routing\Router $router */

use ProposiDocs\Proposal\Entity\ProposalEntity;

$router->get('/proposals', function () use ($router) {
	$proposals = \ProposiDocs\Proposal\ProposalService::getAll();
	$data = [];

	/** @var ProposalEntity $proposal */
	foreach ($proposals as $proposal) {
		$data[] = $proposal->toArray();
	}
	return $data;
});

$router->post('/proposal', function (\Illuminate\Http\Request $request) use ($router) {
	$title = $request->json()->get('subject');
	$price = $request->json()->get('price');
	$description = $request->json()->get('description');
	$proposal = new ProposalEntity($title, $description, $price);
	return \ProposiDocs\Proposal\ProposalService::create($proposal)->toArray();
});

$router->put('/proposal/{id}', function ($id, \Illuminate\Http\Request $request) use ($router) {
	return false;
});

$router->delete('/proposal/{id}', function ($id) use ($router) {
	$proposal = \ProposiDocs\Proposal\ProposalService::getProposal($id);
	return \ProposiDocs\Proposal\ProposalService::deleteProposal($proposal);
});

$router->get('/proposal/{id}', function ($id) use ($router) {
	return \ProposiDocs\Proposal\ProposalService::getProposal($id)->toArray();
});

$router->get('/proposal/{id}/isSigned', function ($id) use ($router) {
	$proposalEntity = \ProposiDocs\Proposal\ProposalService::getProposal($id);
	return $proposalEntity->isSigned();
});

$router->get('/proposal/{id}/isOpened', function ($id) use ($router) {
	$proposalEntity = \ProposiDocs\Proposal\ProposalService::getProposal($id);
	return $proposalEntity->isOpen();
});

$router->get('/proposal/{id}/isDeclined', function ($id) use ($router) {
	$proposalEntity = \ProposiDocs\Proposal\ProposalService::getProposal($id);
	return $proposalEntity->isDeclined();
});

$router->get('/proposal/{id}/getLastVersion', function ($id) use ($router) {
	return 'getLastVersion proposal ' . $id;
});
