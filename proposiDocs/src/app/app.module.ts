
import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';

import { FormsModule } from '@angular/forms';
import { AppComponent } from './app.component';
import { HttpClientModule} from '@angular/common/http';

import { ContractService } from './contract.service';

import { EditComponent } from './contract/edit/edit.component';
import { ListComponent } from './contract/list/list.component';

@NgModule({
  declarations: [
    AppComponent,
    EditComponent,
    ListComponent,
 
 
  ],
  imports: [
    BrowserModule,
    FormsModule,
    // AppRoutingModule,
    FormsModule,
    HttpClientModule,

  ],
  providers: [
    ContractService
  ],
  bootstrap: [AppComponent]
})
export class AppModule { }
