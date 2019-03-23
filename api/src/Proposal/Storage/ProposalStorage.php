<?php

namespace ProposiDocs\Proposal\Storage;

use ProposiDocs\Proposal\Entity\ProposalEntity;

interface ProposalStorage {

	public function insertProposal(ProposalEntity $entity): int;
	public function getProposal(int $proposalId): ProposalEntity;

}
