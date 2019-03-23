
import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';

import { FormsModule } from '@angular/forms';
import { AppComponent } from './app.component';
import { HttpClientModule} from '@angular/common/http';

import { ContractService } from './contract.service';

import { EditComponent } from './contract/edit/edit.component';
import { ListComponent } from './contract/list/list.component';
import { ViewComponent } from './contract/view/view.component';

import { RouterModule, Routes } from '@angular/router';
import { HeaderComponent } from './shared/header/header.component';

const appRoutes: Routes = [
  //{ path: 'crisis-center', component: CrisisListComponent },
  { path: 'list',      component: ListComponent },
  { path: 'view/:id',      component: ViewComponent },
  // {
  //   path: 'heroes',
  //   component: HeroListComponent,
  //   data: { title: 'Heroes List' }
  // },
  { path: '',
    redirectTo: 'list',
    pathMatch: 'full'
  },
  //{ path: '**', component: PageNotFoundComponent }
];

@NgModule({
  declarations: [
    AppComponent,
    EditComponent,
    ListComponent,
    ViewComponent,
    HeaderComponent,

  ],
  imports: [
    BrowserModule,
    FormsModule,
    // AppRoutingModule,
    FormsModule,
    HttpClientModule,
    RouterModule.forRoot(
      appRoutes,
      { enableTracing: false } // <-- debugging purposes only
    ),

  ],
  providers: [
    ContractService
  ],
  bootstrap: [AppComponent]
})
export class AppModule { }
