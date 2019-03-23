import { Component, OnInit } from '@angular/core';
import { Router } from "@angular/router";
import { ContractService } from '../../contract.service';

@Component({
  selector: 'app-list',
  templateUrl: './list.component.html',
  styleUrls: ['./list.component.css']
})
export class ListComponent implements OnInit {

	title = 'proposiDocs';
	_contract =null;
	
 

	// _contract = [
	// 	{
	// 		id:1,
	// 		subject:'Proposta X',
	// 		description:'Era uma vez uma proposta',
	// 		price: 1510.00,
	// 		isOpened:false,
	// 		isSigned:true

	// 	},
	// 	{
	// 		id:2,
	// 		subject:'Proposta Y',
	// 		description:'tea te easasass',
	// 		price: 230.00,
	// 		isOpened:true,
	// 		isSigned:true

	// 	},
	// 	{
	// 		id:3,
	// 		subject:'Proposta Z',
	// 		description:'teste teste tesr',
	// 		price: 450.00,
	// 		isOpened:false,
	// 		isSigned:false

	// 	}
	// ]

  constructor(private _contractService: ContractService, private router: Router) { }

	
	ngOnInit() {
  	this.getProposals();
  }

	getProposals(){
		this._contractService.getProposals().subscribe(
			result => this._contract = result
		);
    
    return this._contract;
  }

  selecionarUsuario(id: string) {
  	this.router.navigate([`/view/${id}`]);
  }

  adicionaUsuario(){
    this._contractService.addProposal(this._contract).subscribe(
      data =>{
        if(data['result'] == 'OK'){
          //alert(data['msg']);
          this.getProposals();
        }
      }
    );
	}
	
	editarUsuario(){
    this._contractService.updateProposal(this._contract,1).subscribe(
      data =>{
        if(data['result'] == 'OK'){
          //alert(data['msg']);
          this.getProposals();
        }
      }
    );
  }

}
