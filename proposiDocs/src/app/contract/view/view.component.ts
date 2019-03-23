import { Component, OnInit } from '@angular/core';
import { Router, ActivatedRoute, ParamMap } from "@angular/router";
import { ContractService } from '../../contract.service';

@Component({
  selector: 'app-view',
  templateUrl: './view.component.html',
  styleUrls: ['./view.component.css']
})
export class ViewComponent implements OnInit {

  constructor(
    private _contractService: ContractService,
    private route: ActivatedRoute,
    private router: Router
    ) { }

  _contract = {
    "id": "",
  	"title": "Dream Contract",
		"description": "It's a big and huge contract!",
		"price": 80000
  }

  ngOnInit() {
    this._contract.id = this.route.snapshot.paramMap.get("id")
    this.getProposal(this._contract.id)
  }

  getProposal(id: string){
    // this._contractService.getProposals().subscribe(
    //   result => this._contract = result
    // );

    return this._contract;

  }

}
