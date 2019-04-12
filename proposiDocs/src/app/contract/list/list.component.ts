import {
  Component,
  OnInit
} from '@angular/core';
import {
  Router
} from "@angular/router";
import {
  ContractService
} from '../../contract.service';

@Component({
  selector: 'app-list',
  templateUrl: './list.component.html',
  styleUrls: ['./list.component.css']
})
export class ListComponent implements OnInit {

  title = 'proposiDocs';
  //_contract = null;

	_contract ={
			id: null,
			subject: null,
			description: null,
			price: null,
			isOpened: null,
			isSigned: null,
	}

	//_contracts =null

 

  _contracts = [
  	{
  		id:1,
  		subject:'Proposta X',
  		description:'Era uma vez uma proposta',
  		price: 1510.00, 
  		isOpened:false,
  		isSigned:true

  	},
  	{
  		id:2,
  		subject:'Proposta Y',
  		description:'tea te easasass',
  		price: 230.00,
  		isOpened:true,
  		isSigned:true

  	},
  	{
  		id:3,
  		subject:'Proposta Z',
  		description:'teste teste tesr',
  		price: 450.00,
  		isOpened:false,
  		isSigned:false

  	}
  ]

 
  constructor(private _contractService: ContractService, private router: Router) {}


  ngOnInit() {
    this.getProposals();
  }

  getProposals() {
    // this._contractService.getProposals().subscribe(
    //   result => this._contracts = result
    // );
		
    return this._contracts;
  }

  signProposal(id: string) {
    this.router.navigate([`/view/${id}`]);
  }

  newProposal() {

	this._contract.isOpened=false
	this._contract.isSigned=false

	console.log(this._contract)

    this._contractService.addProposal(this._contract).subscribe(
      data => {
        if (data['result'] == 'OK') {
          //alert(data['msg']);
          this.getProposals();
        }
      }
    );
  }

  confirmRemove(){
	if(confirm("Are you sure to delete?")) {
		alert("I'll be deleted!")
    }
	 
  }

}
