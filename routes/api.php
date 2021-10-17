<?php

use App\Http\Controllers\Addrs\Create as AddrsCreate;
use App\Http\Controllers\Addrs\Destroy as AddrsDestroy;
use App\Http\Controllers\Addrs\Edit as AddrsEdit;
// use App\Http\Controllers\About\Index as AboutIndex;
// use App\Http\Controllers\Privacy\Index as PrivacyIndex;
// use App\Http\Controllers\Termsandconditions\Index as TermsandconditionsIndex;
// use App\Http\Controllers\Contact\Index as ContactIndex;
use App\Http\Controllers\Addrs\ExportExcel as AddrsExportExcel;
use App\Http\Controllers\Addrs\Index as AddrsIndex;
use App\Http\Controllers\Addrs\InitTable as AddrsInitTable;
use App\Http\Controllers\Addrs\Options as AddrsOptions;
use App\Http\Controllers\Addrs\Show as AddrsShow;
use App\Http\Controllers\Addrs\Store as AddrsStore;
use App\Http\Controllers\Addrs\TableData as AddrsTableData;
use App\Http\Controllers\Addrs\Update as AddrsUpdate;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Authors\Create as AuthorsCreate;
use App\Http\Controllers\Authors\Destroy as AuthorsDestroy;
use App\Http\Controllers\Authors\Edit as AuthorsEdit;
use App\Http\Controllers\Authors\ExportExcel as AuthorsExportExcel;
use App\Http\Controllers\Authors\Index as AuthorsIndex;
use App\Http\Controllers\Authors\InitTable as AuthorsInitTable;
use App\Http\Controllers\Authors\Options as AuthorsOptions;
use App\Http\Controllers\Authors\Show as AuthorsShow;
use App\Http\Controllers\Authors\Store as AuthorsStore;
use App\Http\Controllers\Authors\TableData as AuthorsTableData;
use App\Http\Controllers\Authors\Update as AuthorsUpdate;
use App\Http\Controllers\Chan\Create as ChanCreate;
use App\Http\Controllers\Chan\Destroy as ChanDestroy;
use App\Http\Controllers\Chan\Edit as ChanEdit;
use App\Http\Controllers\Chan\ExportExcel as ChanExportExcel;
use App\Http\Controllers\Chan\Index as ChanIndex;
use App\Http\Controllers\Chan\InitTable as ChanInitTable;
use App\Http\Controllers\Chan\Options as ChanOptions;
use App\Http\Controllers\Chan\Show as ChanShow;
use App\Http\Controllers\Chan\Store as ChanStore;
use App\Http\Controllers\Chan\TableData as ChanTableData;
use App\Http\Controllers\Chan\Update as ChanUpdate;
use App\Http\Controllers\Citations\Create as CitationsCreate;
use App\Http\Controllers\Citations\Destroy as CitationsDestroy;
use App\Http\Controllers\Citations\Edit as CitationsEdit;
use App\Http\Controllers\Citations\ExportExcel as CitationsExportExcel;
use App\Http\Controllers\Citations\Index as CitationsIndex;
use App\Http\Controllers\Citations\InitTable as CitationsInitTable;
use App\Http\Controllers\Citations\Options as CitationsOptions;
use App\Http\Controllers\Citations\Show as CitationsShow;
use App\Http\Controllers\Citations\Store as CitationsStore;
use App\Http\Controllers\Citations\TableData as CitationsTableData;
use App\Http\Controllers\Citations\Update as CitationsUpdate;
use App\Http\Controllers\Companies\Index as CompanyIndex;
use App\Http\Controllers\Dashboard\ChartController;
use App\Http\Controllers\Dna\Create as DnaCreate;
use App\Http\Controllers\Dna\Destroy as DnaDestroy;
use App\Http\Controllers\Dna\Edit as DnaEdit;
use App\Http\Controllers\Dna\ExportExcel as DnaExportExcel;
use App\Http\Controllers\Dna\Index as DnaIndex;
use App\Http\Controllers\Dna\InitTable as DnaInitTable;
use App\Http\Controllers\Dna\Options as DnaOptions;
use App\Http\Controllers\Dna\Show as DnaShow;
use App\Http\Controllers\Dna\Store as DnaStore;
use App\Http\Controllers\Dna\TableData as DnaTableData;
use App\Http\Controllers\Dna\Update as DnaUpdate;
use App\Http\Controllers\DnaMatching\Create as DnaMatchingCreate;
use App\Http\Controllers\DnaMatching\Destroy as DnaMatchingDestroy;
use App\Http\Controllers\DnaMatching\Edit as DnaMatchingEdit;
use App\Http\Controllers\DnaMatching\ExportExcel as DnaMatchingExportExcel;
use App\Http\Controllers\DnaMatching\Index as DnaMatchingIndex;
use App\Http\Controllers\DnaMatching\InitTable as DnaMatchingInitTable;
use App\Http\Controllers\DnaMatching\Options as DnaMatchingOptions;
use App\Http\Controllers\DnaMatching\Show as DnaMatchingShow;
use App\Http\Controllers\DnaMatching\Store as DnaMatchingStore;
use App\Http\Controllers\DnaMatching\TableData as DnaMatchingTableData;
use App\Http\Controllers\DnaMatching\Update as DnaMatchingUpdate;
use App\Http\Controllers\Families\Create as FamiliesCreate;
use App\Http\Controllers\Families\Destroy as FamiliesDestroy;
use App\Http\Controllers\Families\Edit as FamiliesEdit;
use App\Http\Controllers\Families\ExportExcel as FamiliesExportExcel;
use App\Http\Controllers\Families\Index as FamiliesIndex;
use App\Http\Controllers\Families\InitTable as FamiliesInitTable;
use App\Http\Controllers\Families\Options as FamiliesOptions;
use App\Http\Controllers\Families\Show as FamiliesShow;
use App\Http\Controllers\Families\Store as FamiliesStore;
use App\Http\Controllers\Families\TableData as FamiliesTableData;
use App\Http\Controllers\Families\Update as FamiliesUpdate;
use App\Http\Controllers\Familyevents\Create as FamilyeventsCreate;
use App\Http\Controllers\Familyevents\Destroy as FamilyeventsDestroy;
use App\Http\Controllers\Familyevents\Edit as FamilyeventsEdit;
use App\Http\Controllers\Familyevents\ExportExcel as FamilyeventsExportExcel;
use App\Http\Controllers\Familyevents\Index as FamilyeventsIndex;
use App\Http\Controllers\Familyevents\InitTable as FamilyeventsInitTable;
use App\Http\Controllers\Familyevents\Options as FamilyeventsOptions;
use App\Http\Controllers\Familyevents\Show as FamilyeventsShow;
use App\Http\Controllers\Familyevents\Store as FamilyeventsStore;
use App\Http\Controllers\Familyevents\TableData as FamilyeventsTableData;
use App\Http\Controllers\Familyevents\Update as FamilyeventsUpdate;
use App\Http\Controllers\FamilySearch\FamilySearchController;
use App\Http\Controllers\Familyslugs\Create as FamilyslugsCreate;
use App\Http\Controllers\Familyslugs\Destroy as FamilyslugsDestroy;
use App\Http\Controllers\Familyslugs\Edit as FamilyslugsEdit;
use App\Http\Controllers\Familyslugs\ExportExcel as FamilyslugsExportExcel;
use App\Http\Controllers\Familyslugs\Index as FamilyslugsIndex;
use App\Http\Controllers\Familyslugs\InitTable as FamilyslugsInitTable;
use App\Http\Controllers\Familyslugs\Options as FamilyslugsOptions;
use App\Http\Controllers\Familyslugs\Show as FamilyslugsShow;
use App\Http\Controllers\Familyslugs\Store as FamilyslugsStore;
use App\Http\Controllers\Familyslugs\TableData as FamilyslugsTableData;
use App\Http\Controllers\Familyslugs\Update as FamilyslugsUpdate;
use App\Http\Controllers\Gedcom\Store as GedcomStore;
use App\Http\Controllers\Gedcom\Export as GedcomExport;
use App\Http\Controllers\Geneanum\GeneanumController;
use App\Http\Controllers\MediaObjects\Create as MediaobjectsCreate;
use App\Http\Controllers\MediaObjects\Destroy as MediaobjectsDestroy;
use App\Http\Controllers\MediaObjects\Edit as MediaobjectsEdit;
use App\Http\Controllers\MediaObjects\ExportExcel as MediaobjectsExportExcel;
use App\Http\Controllers\MediaObjects\Index as MediaobjectsIndex;
use App\Http\Controllers\MediaObjects\InitTable as MediaobjectsInitTable;
use App\Http\Controllers\MediaObjects\Options as MediaobjectsOptions;
use App\Http\Controllers\MediaObjects\Show as MediaobjectsShow;
use App\Http\Controllers\MediaObjects\Store as MediaobjectsStore;
use App\Http\Controllers\MediaObjects\TableData as MediaobjectsTableData;
use App\Http\Controllers\MediaObjects\Update as MediaobjectsUpdate;
use App\Http\Controllers\Notes\Create as NotesCreate;
use App\Http\Controllers\Notes\Destroy as NotesDestroy;
use App\Http\Controllers\Notes\Edit as NotesEdit;
use App\Http\Controllers\Notes\ExportExcel as NotesExportExcel;
use App\Http\Controllers\Notes\Index as NotesIndex;
use App\Http\Controllers\Notes\InitTable as NotesInitTable;
use App\Http\Controllers\Notes\Options as NotesOptions;
use App\Http\Controllers\Notes\Show as NotesShow;
use App\Http\Controllers\Notes\Store as NotesStore;
use App\Http\Controllers\Notes\TableData as NotesTableData;
use App\Http\Controllers\Notes\Update as NotesUpdate;
use App\Http\Controllers\Openarch\OpenArchController;
use App\Http\Controllers\Paypal\CreatePlans as PaypalCreatePlans;
use App\Http\Controllers\Paypal\CreateProduct as PaypalCreateProduct;
use App\Http\Controllers\Paypal\GetPlans as PaypalGetPlans;
use App\Http\Controllers\Paypal\HandlePayment as PaypalHandlePayment;
use App\Http\Controllers\Paypal\Unsubscribe as PaypalUnsubscribe;
use App\Http\Controllers\Paypal\Webhook as PaypalWebhook;
use App\Http\Controllers\Personalias\Create as PersonaliasCreate;
use App\Http\Controllers\Personalias\Destroy as PersonaliasDestroy;
use App\Http\Controllers\Personalias\Edit as PersonaliasEdit;
use App\Http\Controllers\Personalias\ExportExcel as PersonaliasExportExcel;
use App\Http\Controllers\Personalias\Index as PersonaliasIndex;
use App\Http\Controllers\Personalias\InitTable as PersonaliasInitTable;
use App\Http\Controllers\Personalias\Options as PersonaliasOptions;
use App\Http\Controllers\Personalias\Show as PersonaliasShow;
use App\Http\Controllers\Personalias\Store as PersonaliasStore;
use App\Http\Controllers\Personalias\TableData as PersonaliasTableData;
use App\Http\Controllers\Personalias\Update as PersonaliasUpdate;
use App\Http\Controllers\Personanci\Create as PersonanciCreate;
use App\Http\Controllers\Personanci\Destroy as PersonanciDestroy;
use App\Http\Controllers\Personanci\Edit as PersonanciEdit;
use App\Http\Controllers\Personanci\ExportExcel as PersonanciExportExcel;
use App\Http\Controllers\Personanci\Index as PersonanciIndex;
use App\Http\Controllers\Personanci\InitTable as PersonanciInitTable;
use App\Http\Controllers\Personanci\Options as PersonanciOptions;
use App\Http\Controllers\Personanci\Show as PersonanciShow;
use App\Http\Controllers\Personanci\Store as PersonanciStore;
use App\Http\Controllers\Personanci\TableData as PersonanciTableData;
use App\Http\Controllers\Personanci\Update as PersonanciUpdate;
use App\Http\Controllers\Personasso\Create as PersonassoCreate;
use App\Http\Controllers\Personasso\Destroy as PersonassoDestroy;
use App\Http\Controllers\Personasso\Edit as PersonassoEdit;
use App\Http\Controllers\Personasso\ExportExcel as PersonassoExportExcel;
use App\Http\Controllers\Personasso\Index as PersonassoIndex;
use App\Http\Controllers\Personasso\InitTable as PersonassoInitTable;
use App\Http\Controllers\Personasso\Options as PersonassoOptions;
use App\Http\Controllers\Personasso\Show as PersonassoShow;
use App\Http\Controllers\Personasso\Store as PersonassoStore;
use App\Http\Controllers\Personasso\TableData as PersonassoTableData;
use App\Http\Controllers\Personasso\Update as PersonassoUpdate;
use App\Http\Controllers\Personevent\Create as PersoneventCreate;
use App\Http\Controllers\Personevent\Destroy as PersoneventDestroy;
use App\Http\Controllers\Personevent\Edit as PersoneventEdit;
use App\Http\Controllers\Personevent\ExportExcel as PersoneventExportExcel;
use App\Http\Controllers\Personevent\Index as PersoneventIndex;
use App\Http\Controllers\Personevent\InitTable as PersoneventInitTable;
use App\Http\Controllers\Personevent\Options as PersoneventOptions;
use App\Http\Controllers\Personevent\Show as PersoneventShow;
use App\Http\Controllers\Personevent\Store as PersoneventStore;
use App\Http\Controllers\Personevent\TableData as PersoneventTableData;
use App\Http\Controllers\Personevent\Update as PersoneventUpdate;
use App\Http\Controllers\Personlds\Create as PersonldsCreate;
use App\Http\Controllers\Personlds\Destroy as PersonldsDestroy;
use App\Http\Controllers\Personlds\Edit as PersonldsEdit;
use App\Http\Controllers\Personlds\ExportExcel as PersonldsExportExcel;
use App\Http\Controllers\Personlds\Index as PersonldsIndex;
use App\Http\Controllers\Personlds\InitTable as PersonldsInitTable;
use App\Http\Controllers\Personlds\Options as PersonldsOptions;
use App\Http\Controllers\Personlds\Show as PersonldsShow;
use App\Http\Controllers\Personlds\Store as PersonldsStore;
use App\Http\Controllers\Personlds\TableData as PersonldsTableData;
use App\Http\Controllers\Personlds\Update as PersonldsUpdate;
use App\Http\Controllers\Personsubm\Create as PersonsubmCreate;
use App\Http\Controllers\Personsubm\Destroy as PersonsubmDestroy;
use App\Http\Controllers\Personsubm\Edit as PersonsubmEdit;
use App\Http\Controllers\Personsubm\ExportExcel as PersonsubmExportExcel;
use App\Http\Controllers\Personsubm\Index as PersonsubmIndex;
use App\Http\Controllers\Personsubm\InitTable as PersonsubmInitTable;
use App\Http\Controllers\Personsubm\Options as PersonsubmOptions;
use App\Http\Controllers\Personsubm\Show as PersonsubmShow;
use App\Http\Controllers\Personsubm\Store as PersonsubmStore;
use App\Http\Controllers\Personsubm\TableData as PersonsubmTableData;
use App\Http\Controllers\Personsubm\Update as PersonsubmUpdate;
use App\Http\Controllers\Places\Create as PlacesCreate;
use App\Http\Controllers\Places\Destroy as PlacesDestroy;
use App\Http\Controllers\Places\Edit as PlacesEdit;
use App\Http\Controllers\Places\ExportExcel as PlacesExportExcel;
use App\Http\Controllers\Places\Index as PlacesIndex;
use App\Http\Controllers\Places\InitTable as PlacesInitTable;
use App\Http\Controllers\Places\Options as PlacesOptions;
use App\Http\Controllers\Places\Show as PlacesShow;
use App\Http\Controllers\Places\Store as PlacesStore;
use App\Http\Controllers\Places\TableData as PlacesTableData;
use App\Http\Controllers\Places\Update as PlacesUpdate;
use App\Http\Controllers\Publications\Create as PublicationsCreate;
use App\Http\Controllers\Publications\Destroy as PublicationsDestroy;
use App\Http\Controllers\Publications\Edit as PublicationsEdit;
use App\Http\Controllers\Publications\ExportExcel as PublicationsExportExcel;
use App\Http\Controllers\Publications\Index as PublicationsIndex;
use App\Http\Controllers\Publications\InitTable as PublicationsInitTable;
use App\Http\Controllers\Publications\Options as PublicationsOptions;
use App\Http\Controllers\Publications\Show as PublicationsShow;
use App\Http\Controllers\Publications\Store as PublicationsStore;
use App\Http\Controllers\Publications\TableData as PublicationsTableData;
use App\Http\Controllers\Publications\Update as PublicationsUpdate;
use App\Http\Controllers\Refn\Create as RefnCreate;
use App\Http\Controllers\Refn\Destroy as RefnDestroy;
use App\Http\Controllers\Refn\Edit as RefnEdit;
use App\Http\Controllers\Refn\ExportExcel as RefnExportExcel;
use App\Http\Controllers\Refn\Index as RefnIndex;
use App\Http\Controllers\Refn\InitTable as RefnInitTable;
use App\Http\Controllers\Refn\Options as RefnOptions;
use App\Http\Controllers\Refn\Show as RefnShow;
use App\Http\Controllers\Refn\Store as RefnStore;
use App\Http\Controllers\Refn\TableData as RefnTableData;
use App\Http\Controllers\Refn\Update as RefnUpdate;
use App\Http\Controllers\Repositories\Create as RepositoriesCreate;
use App\Http\Controllers\Repositories\Destroy as RepositoriesDestroy;
use App\Http\Controllers\Repositories\Edit as RepositoriesEdit;
use App\Http\Controllers\Repositories\ExportExcel as RepositoriesExportExcel;
use App\Http\Controllers\Repositories\Index as RepositoriesIndex;
use App\Http\Controllers\Repositories\InitTable as RepositoriesInitTable;
use App\Http\Controllers\Repositories\Options as RepositoriesOptions;
use App\Http\Controllers\Repositories\Show as RepositoriesShow;
use App\Http\Controllers\Repositories\Store as RepositoriesStore;
use App\Http\Controllers\Repositories\TableData as RepositoriesTableData;
use App\Http\Controllers\Repositories\Update as RepositoriesUpdate;
use App\Http\Controllers\Sourcedata\Create as SourcedataCreate;
use App\Http\Controllers\Sourcedata\Destroy as SourcedataDestroy;
use App\Http\Controllers\Sourcedata\Edit as SourcedataEdit;
use App\Http\Controllers\Sourcedata\ExportExcel as SourcedataExportExcel;
use App\Http\Controllers\Sourcedata\Index as SourcedataIndex;
use App\Http\Controllers\Sourcedata\InitTable as SourcedataInitTable;
use App\Http\Controllers\Sourcedata\Options as SourcedataOptions;
use App\Http\Controllers\Sourcedata\Show as SourcedataShow;
use App\Http\Controllers\Sourcedata\Store as SourcedataStore;
use App\Http\Controllers\Sourcedata\TableData as SourcedataTableData;
use App\Http\Controllers\Sourcedata\Update as SourcedataUpdate;
use App\Http\Controllers\Sourcedataeven\Create as SourcedataevenCreate;
use App\Http\Controllers\Sourcedataeven\Destroy as SourcedataevenDestroy;
use App\Http\Controllers\Sourcedataeven\Edit as SourcedataevenEdit;
use App\Http\Controllers\Sourcedataeven\ExportExcel as SourcedataevenExportExcel;
use App\Http\Controllers\Sourcedataeven\Index as SourcedataevenIndex;
use App\Http\Controllers\Sourcedataeven\InitTable as SourcedataevenInitTable;
use App\Http\Controllers\Sourcedataeven\Options as SourcedataevenOptions;
use App\Http\Controllers\Sourcedataeven\Show as SourcedataevenShow;
use App\Http\Controllers\Sourcedataeven\Store as SourcedataevenStore;
use App\Http\Controllers\Sourcedataeven\TableData as SourcedataevenTableData;
use App\Http\Controllers\Sourcedataeven\Update as SourcedataevenUpdate;
use App\Http\Controllers\Sourcerefeven\Create as SourcerefevenCreate;
use App\Http\Controllers\Sourcerefeven\Destroy as SourcerefevenDestroy;
use App\Http\Controllers\Sourcerefeven\Edit as SourcerefevenEdit;
use App\Http\Controllers\Sourcerefeven\ExportExcel as SourcerefevenExportExcel;
use App\Http\Controllers\Sourcerefeven\Index as SourcerefevenIndex;
use App\Http\Controllers\Sourcerefeven\InitTable as SourcerefevenInitTable;
use App\Http\Controllers\Sourcerefeven\Options as SourcerefevenOptions;
use App\Http\Controllers\Sourcerefeven\Show as SourcerefevenShow;
use App\Http\Controllers\Sourcerefeven\Store as SourcerefevenStore;
use App\Http\Controllers\Sourcerefeven\TableData as SourcerefevenTableData;
use App\Http\Controllers\Sourcerefeven\Update as SourcerefevenUpdate;
use App\Http\Controllers\Sources\Create as SourcesCreate;
use App\Http\Controllers\Sources\Destroy as SourcesDestroy;
use App\Http\Controllers\Sources\Edit as SourcesEdit;
use App\Http\Controllers\Sources\ExportExcel as SourcesExportExcel;
use App\Http\Controllers\Sources\Index as SourcesIndex;
use App\Http\Controllers\Sources\InitTable as SourcesInitTable;
use App\Http\Controllers\Sources\Options as SourcesOptions;
use App\Http\Controllers\Sources\Show as SourcesShow;
use App\Http\Controllers\Sources\Store as SourcesStore;
use App\Http\Controllers\Sources\TableData as SourcesTableData;
use App\Http\Controllers\Sources\Update as SourcesUpdate;
use App\Http\Controllers\Stripe\GetCurrentSubscription as StripeGetCurrentSubscription;
use App\Http\Controllers\Stripe\GetIntent as StripeGetIntent;
use App\Http\Controllers\Stripe\GetPlans as StripeGetPlans;
use App\Http\Controllers\Stripe\Subscribe as StripeSubscribe;
use App\Http\Controllers\Stripe\Unsubscribe as StripeUnsubscribe;
use App\Http\Controllers\Stripe\Webhook as StripeWebhook;
use App\Http\Controllers\Subm\Create as SubmCreate;
use App\Http\Controllers\Subm\Destroy as SubmDestroy;
use App\Http\Controllers\Subm\Edit as SubmEdit;
use App\Http\Controllers\Subm\ExportExcel as SubmExportExcel;
use App\Http\Controllers\Subm\Index as SubmIndex;
use App\Http\Controllers\Subm\InitTable as SubmInitTable;
use App\Http\Controllers\Subm\Options as SubmOptions;
use App\Http\Controllers\Subm\Show as SubmShow;
use App\Http\Controllers\Subm\Store as SubmStore;
use App\Http\Controllers\Subm\TableData as SubmTableData;
use App\Http\Controllers\Subm\Update as SubmUpdate;
use App\Http\Controllers\Subn\Create as SubnCreate;
use App\Http\Controllers\Subn\Destroy as SubnDestroy;
use App\Http\Controllers\Subn\Edit as SubnEdit;
use App\Http\Controllers\Subn\ExportExcel as SubnExportExcel;
use App\Http\Controllers\Subn\Index as SubnIndex;
use App\Http\Controllers\Subn\InitTable as SubnInitTable;
use App\Http\Controllers\Subn\Options as SubnOptions;
use App\Http\Controllers\Subn\Show as SubnShow;
use App\Http\Controllers\Subn\Store as SubnStore;
use App\Http\Controllers\Subn\TableData as SubnTableData;
use App\Http\Controllers\Subn\Update as SubnUpdate;
use App\Http\Controllers\Trees\Show as TreesShow;
use App\Http\Controllers\Types\Create as TypesCreate;
use App\Http\Controllers\Types\Destroy as TypesDestroy;
use App\Http\Controllers\Types\Edit as TypesEdit;
use App\Http\Controllers\Types\ExportExcel as TypesExportExcel;
use App\Http\Controllers\Types\Index as TypesIndex;
use App\Http\Controllers\Types\InitTable as TypesInitTable;
use App\Http\Controllers\Types\Options as TypesOptions;
use App\Http\Controllers\Types\Show as TypesShow;
use App\Http\Controllers\Types\Store as TypesStore;
use App\Http\Controllers\Types\TableData as TypesTableData;
use App\Http\Controllers\Types\Update as TypesUpdate;
use App\Http\Controllers\Users\Create as UserCreate;
use App\Http\Controllers\Users\Destroy as UserDestroy;
use App\Http\Controllers\Users\Edit as UserEdit;
use App\Http\Controllers\Users\ExportExcel as UserExportExcel;
use App\Http\Controllers\Users\InitTable as UserInitTable;
use App\Http\Controllers\Users\Options as UserOptions;
use App\Http\Controllers\Users\Store as UserStore;
use App\Http\Controllers\Users\TableData as UserTableData;
use App\Http\Controllers\Users\Update as UserUpdate;
use App\Http\Controllers\Wikitree\WikitreeController;
use Illuminate\Support\Facades\Broadcast;
use Illuminate\Support\Facades\Route;
use LaravelEnso\Addresses\Http\Controllers\Create as AddressCreate;
use LaravelEnso\Addresses\Http\Controllers\Destroy as AddressDestroy;
use LaravelEnso\Addresses\Http\Controllers\Edit as AddressEdit;
use LaravelEnso\Addresses\Http\Controllers\Index as AddressIndex;
use LaravelEnso\Addresses\Http\Controllers\Localities;
use LaravelEnso\Addresses\Http\Controllers\Localize as AddressLocalize;
use LaravelEnso\Addresses\Http\Controllers\MakeBilling as AddressMakeBilling;
use LaravelEnso\Addresses\Http\Controllers\MakeDefault as AddressMakeDefault;
use LaravelEnso\Addresses\Http\Controllers\MakeShipping as AddressMakeShipping;
use LaravelEnso\Addresses\Http\Controllers\Options as AddressOptions;
use LaravelEnso\Addresses\Http\Controllers\Postcode;
use LaravelEnso\Addresses\Http\Controllers\Regions;
use LaravelEnso\Addresses\Http\Controllers\Show as AddressShow;
use LaravelEnso\Addresses\Http\Controllers\Store as AddressStore;
use LaravelEnso\Addresses\Http\Controllers\Update as AddressUpdate;
use LaravelEnso\Calendar\Http\Controllers\Calendar\Create as CalendarCreate;
use LaravelEnso\Calendar\Http\Controllers\Calendar\Destroy as CalendarDestroy;
use LaravelEnso\Calendar\Http\Controllers\Calendar\Edit as CalendarEdit;
use LaravelEnso\Calendar\Http\Controllers\Calendar\Index as CalendarIndex;
use LaravelEnso\Calendar\Http\Controllers\Calendar\Options as CalendarOptions;
use LaravelEnso\Calendar\Http\Controllers\Calendar\Store as CalendarStore;
use LaravelEnso\Calendar\Http\Controllers\Calendar\Update as CalendarUpdate;
use LaravelEnso\Calendar\Http\Controllers\Events\Create as EventCreate;
use LaravelEnso\Calendar\Http\Controllers\Events\Destroy as EventDestroy;
use LaravelEnso\Calendar\Http\Controllers\Events\Edit as EventEdit;
use LaravelEnso\Calendar\Http\Controllers\Events\Index as EventIndex;
use LaravelEnso\Calendar\Http\Controllers\Events\Store as EventStore;
use LaravelEnso\Calendar\Http\Controllers\Events\Update as EventUpdate;
use LaravelEnso\Companies\Http\Controllers\Company\Create as CompanyCreate;
use LaravelEnso\Companies\Http\Controllers\Company\Destroy as CompanyDestroy;
use LaravelEnso\Companies\Http\Controllers\Company\Edit as CompanyEdit;
use LaravelEnso\Companies\Http\Controllers\Company\ExportExcel as CompanyExportExcel;
use LaravelEnso\Companies\Http\Controllers\Company\InitTable as CompanyInitTable;
use LaravelEnso\Companies\Http\Controllers\Company\Options as CompanyOptions;
use LaravelEnso\Companies\Http\Controllers\Company\Store as CompanyStore;
use LaravelEnso\Companies\Http\Controllers\Company\TableData as CompanyTableData;
use LaravelEnso\Companies\Http\Controllers\Company\Update as CompanyUpdate;
use LaravelEnso\Companies\Http\Controllers\Person\Create as PeopleCompanyCreate;
use LaravelEnso\Companies\Http\Controllers\Person\Destroy as PeopleCompanyDestroy;
use LaravelEnso\Companies\Http\Controllers\Person\Edit as PeopleCompanyEdit;
use LaravelEnso\Companies\Http\Controllers\Person\Index as PeopleCompany;
use LaravelEnso\Companies\Http\Controllers\Person\Store as PeopleCompanyStore;
use LaravelEnso\Companies\Http\Controllers\Person\Update as PeopleCompanyUpdate;
use LaravelEnso\ControlPanelApi\Http\Controllers\Action as ControlPanelAction;
use LaravelEnso\ControlPanelApi\Http\Controllers\Actions as ControlPanelActions;
use LaravelEnso\ControlPanelApi\Http\Controllers\DownloadLog as ControlPanelDownloadLog;
use LaravelEnso\ControlPanelApi\Http\Controllers\Statistics as ControlPanelStatistics;
use LaravelEnso\People\Http\Controllers\Create as PeopleCreate;
use LaravelEnso\People\Http\Controllers\Destroy as PeopleDestroy;
use LaravelEnso\People\Http\Controllers\Edit as PeopleEdit;
use LaravelEnso\People\Http\Controllers\ExportExcel as PeopleExportExcel;
use LaravelEnso\People\Http\Controllers\InitTable as PeopleInitTable;
use LaravelEnso\People\Http\Controllers\Options as PeopleOptions;
use LaravelEnso\People\Http\Controllers\Store as PeopleStore;
use LaravelEnso\People\Http\Controllers\TableData as PeopleTableData;
use LaravelEnso\People\Http\Controllers\Update as PeopleUpdate;

/**
 * Route::middleware(['guest'])
 * ->prefix('api')
 * ->group(
 * function() {.
 *
 * Route::namespace('')
 * ->prefix('about')
 * ->as('about.')
 * ->group(function () {
 * Route::get('about', AboutIndex::class)->name('index');
 * });
 * Route::namespace('')
 * ->prefix('termsandconditions')
 * ->as('termsandconditions.')
 * ->group(function () {
 * Route::get('termsandconditions', TermsandconditionsIndex::class)->name('index');
 * });
 * Route::namespace('')
 * ->prefix('privacy')
 * ->as('privacy.')
 * ->group(function () {
 * Route::get('privacy', PrivacyIndex::class)->name('index');
 * });
 * Route::namespace('')
 * ->prefix('contact')
 * ->as('contact.')
 * ->group(function () {
 * Route::get('contact', ContactIndex::class)->name('index');
 * });
 * });
 *
 **/
Route::namespace('Auth')
    ->middleware('api')
    ->group(function () {
        Route::middleware('guest')->group(function () {
            Route::get('login/{provider}', [LoginController::class, 'redirectToProvider'])->name('login.provider');
            Route::get('login/{provider}/callback', [LoginController::class, 'handleProviderCallback'])->name('login.provider.callback');

            Route::post('login', [LoginController::class, 'login'])->name('login');
        });

        Route::middleware('auth')->group(function () {
            Route::post('logout', [LoginController::class, 'logout'])->name('logout');
        });

        Route::post('register', [RegisterController::class, 'create']);
        Route::post('verify', [RegisterController::class, 'verify_user']);
    });

// Route::middleware(['api'])->group(
//     function() {

//     }
// );

// example data for the dashboard
Route::middleware(['web', 'auth', 'multitenant'])
    ->namespace('')
    ->prefix('dashboard')->as('dashboard.')
    ->group(function () {
        Route::get('line', [ChartController::class, 'line'])
            ->name('line');
        Route::get('bar', [ChartController::class, 'bar'])
            ->name('bar');
        Route::get('pie', [ChartController::class, 'pie'])
            ->name('pie');
        Route::get('doughnut', [ChartController::class, 'doughnut'])
            ->name('doughnut');
        Route::get('radar', [ChartController::class, 'radar'])
            ->name('radar');
        Route::get('polar', [ChartController::class, 'polar'])
            ->name('polar');
        Route::get('bubble', [ChartController::class, 'bubble'])
            ->name('bubble');
        Route::post('changedb', [ChartController::class, 'changedb'])
            ->name('changedb');
        Route::post('getdb', [ChartController::class, 'getDB'])
            ->name('getdb');
        Route::get('trial', [ChartController::class, 'trial'])
            ->name('trial');
    });

Route::middleware(['api', 'auth', 'core', 'multitenant'])
    ->group(function () {
        Route::namespace('')
            ->prefix('citations')
            ->as('citations.')
            ->group(function () {
                Route::get('', CitationsIndex::class)->name('index');
                Route::get('create', CitationsCreate::class)->name('create');
                Route::post('', CitationsStore::class)->name('store');
                Route::get('{citation}/edit', CitationsEdit::class)->name('edit');

                Route::patch('{citation}', CitationsUpdate::class)->name('update');

                Route::delete('{citation}', CitationsDestroy::class)->name('destroy');

                Route::get('initTable', CitationsInitTable::class)->name('initTable');
                Route::get('tableData', CitationsTableData::class)->name('tableData');
                Route::get('exportExcel', CitationsExportExcel::class)->name('exportExcel');

                Route::get('options', CitationsOptions::class)->name('options');
                Route::get('{citation}', CitationsShow::class)->name('show');
            });
    });
Route::middleware(['api', 'auth', 'core'])
    ->group(function () {
        Route::namespace('')
            ->prefix('dna')
            ->as('dna.')
            ->group(function () {
                Route::get('', DnaIndex::class)->name('index');
                Route::get('create', DnaCreate::class)->name('create');
                Route::post('', DnaStore::class)->name('store');
                Route::get('{dna}/edit', DnaEdit::class)->name('edit');

                Route::patch('{dna}', DnaUpdate::class)->name('update');

                Route::delete('{dna}', DnaDestroy::class)->name('destroy');

                Route::get('initTable', DnaInitTable::class)->name('initTable');
                Route::get('tableData', DnaTableData::class)->name('tableData');
                Route::get('exportExcel', DnaExportExcel::class)->name('exportExcel');

                Route::get('options', DnaOptions::class)->name('options');
                Route::get('{dna}', DnaShow::class)->name('show');
            });
    });
Route::middleware(['api', 'auth', 'core'])
    ->group(function () {
        Route::namespace('')
            ->prefix('dnamatching')
            ->as('dnamatching.')
            ->group(function () {
                Route::get('', DnaMatchingIndex::class)->name('index');
                Route::get('initTable', DnaMatchingInitTable::class)->name('initTable');
                Route::get('tableData', DnaMatchingTableData::class)->name('tableData');
                Route::get('exportExcel', DnaMatchingExportExcel::class)->name('exportExcel');
                Route::get('options', DnaMatchingOptions::class)->name('options');
                Route::get('{dnamatching}', DnaMatchingShow::class)->name('show');
            });
    });

Route::middleware(['api', 'auth', 'core', 'multitenant'])
    ->group(function () {
        Route::namespace('')
            ->prefix('families')
            ->as('families.')
            ->group(function () {
                Route::get('', FamiliesIndex::class)->name('index');
                Route::get('create', FamiliesCreate::class)->name('create');
                Route::post('', FamiliesStore::class)->name('store');
                Route::get('{family}/edit', FamiliesEdit::class)->name('edit');

                Route::patch('{family}', FamiliesUpdate::class)->name('update');

                Route::delete('{family}', FamiliesDestroy::class)->name('destroy');

                Route::get('initTable', FamiliesInitTable::class)->name('initTable');
                Route::get('tableData', FamiliesTableData::class)->name('tableData');
                Route::get('exportExcel', FamiliesExportExcel::class)->name('exportExcel');

                Route::get('options', FamiliesOptions::class)->name('options');
                Route::get('{family}', FamiliesShow::class)->name('show');
            });
    });

Route::middleware(['api', 'auth', 'core', 'multitenant'])
    ->group(function () {
        Route::namespace('')
            ->prefix('notes')
            ->as('notes.')
            ->group(function () {
                Route::get('', NotesIndex::class)->name('index');
                Route::get('create', NotesCreate::class)->name('create');
                Route::post('', NotesStore::class)->name('store');
                Route::get('{note}/edit', NotesEdit::class)->name('edit');

                Route::patch('{note}', NotesUpdate::class)->name('update');

                Route::delete('{note}', NotesDestroy::class)->name('destroy');

                Route::get('initTable', NotesInitTable::class)->name('initTable');
                Route::get('tableData', NotesTableData::class)->name('tableData');
                Route::get('exportExcel', NotesExportExcel::class)->name('exportExcel');

                Route::get('options', NotesOptions::class)->name('options');
                Route::get('{note}', NotesShow::class)->name('show');
            });
    });

Route::middleware(['api', 'auth', 'core', 'multitenant'])
    ->group(function () {
        Route::namespace('')
            ->prefix('places')
            ->as('places.')
            ->group(function () {
                Route::get('', PlacesIndex::class)->name('index');
                Route::get('create', PlacesCreate::class)->name('create');
                Route::post('', PlacesStore::class)->name('store');
                Route::get('{place}/edit', PlacesEdit::class)->name('edit');

                Route::patch('{place}', PlacesUpdate::class)->name('update');

                Route::delete('{place}', PlacesDestroy::class)->name('destroy');

                Route::get('initTable', PlacesInitTable::class)->name('initTable');
                Route::get('tableData', PlacesTableData::class)->name('tableData');
                Route::get('exportExcel', PlacesExportExcel::class)->name('exportExcel');

                Route::get('options', PlacesOptions::class)->name('options');
                Route::get('{place}', PlacesShow::class)->name('show');
            });
    });

Route::middleware(['api', 'auth', 'core', 'multitenant'])
    ->group(function () {
        Route::namespace('')
            ->prefix('repositories')
            ->as('repositories.')
            ->group(function () {
                Route::get('', RepositoriesIndex::class)->name('index');
                Route::get('create', RepositoriesCreate::class)->name('create');
                Route::post('', RepositoriesStore::class)->name('store');
                Route::get('{repository}/edit', RepositoriesEdit::class)->name('edit');

                Route::patch('{repository}', RepositoriesUpdate::class)->name('update');

                Route::delete('{repository}', RepositoriesDestroy::class)->name('destroy');

                Route::get('initTable', RepositoriesInitTable::class)->name('initTable');
                Route::get('tableData', RepositoriesTableData::class)->name('tableData');
                Route::get('exportExcel', RepositoriesExportExcel::class)->name('exportExcel');

                Route::get('options', RepositoriesOptions::class)->name('options');
                Route::get('{repository}', RepositoriesShow::class)->name('show');
            });
    });

Route::middleware(['api', 'auth', 'core', 'multitenant'])
    ->group(function () {
        Route::namespace('')
            ->prefix('sources')
            ->as('sources.')
            ->group(function () {
                Route::get('', SourcesIndex::class)->name('index');
                Route::get('create', SourcesCreate::class)->name('create');
                Route::post('', SourcesStore::class)->name('store');
                Route::get('{source}/edit', SourcesEdit::class)->name('edit');

                Route::patch('{source}', SourcesUpdate::class)->name('update');

                Route::delete('{source}', SourcesDestroy::class)->name('destroy');

                Route::get('initTable', SourcesInitTable::class)->name('initTable');
                Route::get('tableData', SourcesTableData::class)->name('tableData');
                Route::get('exportExcel', SourcesExportExcel::class)->name('exportExcel');

                Route::get('options', SourcesOptions::class)->name('options');
                Route::get('{source}', SourcesShow::class)->name('show');
            });
    });

Route::middleware(['api', 'auth', 'core', 'multitenant'])
    ->group(function () {
        Route::namespace('')
            ->prefix('types')
            ->as('types.')
            ->group(function () {
                Route::get('', TypesIndex::class)->name('index');
                Route::get('create', TypesCreate::class)->name('create');
                Route::post('', TypesStore::class)->name('store');
                Route::get('{type}/edit', TypesEdit::class)->name('edit');

                Route::patch('{type}', TypesUpdate::class)->name('update');

                Route::delete('{type}', TypesDestroy::class)->name('destroy');

                Route::get('initTable', TypesInitTable::class)->name('initTable');
                Route::get('tableData', TypesTableData::class)->name('tableData');
                Route::get('exportExcel', TypesExportExcel::class)->name('exportExcel');

                Route::get('options', TypesOptions::class)->name('options');
                Route::get('{type}', TypesShow::class)->name('show');
            });
    });

Route::middleware(['api', 'auth', 'core', 'multitenant'])
    ->group(function () {
        Route::namespace('')
            ->prefix('trees')
            ->as('trees.')
            ->group(function () {
                Route::get('show', TreesShow::class)->name('show');
            });
    });

Route::middleware(['api', 'auth', 'core', 'multitenant'])
    ->group(function () {
        Route::namespace('')
            ->prefix('authors')
            ->as('authors.')
            ->group(function () {
                Route::get('', AuthorsIndex::class)->name('index');
                Route::get('create', AuthorsCreate::class)->name('create');
                Route::post('', AuthorsStore::class)->name('store');
                Route::get('{author}/edit', AuthorsEdit::class)->name('edit');

                Route::patch('{author}', AuthorsUpdate::class)->name('update');

                Route::delete('{author}', AuthorsDestroy::class)->name('destroy');

                Route::get('initTable', AuthorsInitTable::class)->name('initTable');
                Route::get('tableData', AuthorsTableData::class)->name('tableData');
                Route::get('exportExcel', AuthorsExportExcel::class)->name('exportExcel');

                Route::get('options', AuthorsOptions::class)->name('options');
                Route::get('{author}', AuthorsShow::class)->name('show');
            });
    });
Route::middleware(['api', 'auth', 'core', 'multitenant'])
    ->group(function () {
        Route::namespace('')
            ->prefix('publications')
            ->as('publications.')
            ->group(function () {
                Route::get('', PublicationsIndex::class)->name('index');
                Route::get('create', PublicationsCreate::class)->name('create');
                Route::post('', PublicationsStore::class)->name('store');
                Route::get('{publication}/edit', PublicationsEdit::class)->name('edit');

                Route::patch('{publication}', PublicationsUpdate::class)->name('update');

                Route::delete('{publication}', PublicationsDestroy::class)->name('destroy');

                Route::get('initTable', PublicationsInitTable::class)->name('initTable');
                Route::get('tableData', PublicationsTableData::class)->name('tableData');
                Route::get('exportExcel', PublicationsExportExcel::class)->name('exportExcel');

                Route::get('options', PublicationsOptions::class)->name('options');
                Route::get('{publication}', PublicationsShow::class)->name('show');
            });
    });

Route::middleware(['api', 'auth', 'core', 'multitenant'])
    ->group(function () {
        Route::namespace('')
            ->prefix('gedcom')
            ->as('gedcom.')
            ->group(function () {
                Route::post('store', GedcomStore::class)->name('store');
            });
    });

Route::get('gedcom/progress', '\App\Http\Controllers\Gedcom\Progress@index')->name('progress');

// Wikitree
Route::get('wikitree/get-authcode', [WikitreeController::class, 'getAuthCode'])->name('wikitree.get-authcode');
Route::get('wikitree/clientLoginResponse', [WikitreeController::class, 'getAuthCodeCallBack'])->name('wikitree.clientLoginResponse');
Route::get('wikitree/search-person', [WikitreeController::class, 'searchPerson'])->name('wikitree.search-person');

// OpenArch
Route::prefix('open-arch')->group(function () {
    Route::get('search-person', [OpenArchController::class, 'searchPerson'])->name('search-person');
});

// OpenArch
Route::prefix('family-search')->group(function () {
    Route::get('search', [FamilySearchController::class, 'searchPerson'])->name('search-person');
});

// Geneanum
Route::prefix('geneanum')->group(function () {
    Route::get('search-person/{nation}/burials', [GeneanumController::class, 'burials']);
    Route::get('search-person/{nation}/mariage', [GeneanumController::class, 'mariage']);
    Route::get('search-person/{nation}/baptism', [GeneanumController::class, 'baptism']);
});

Route::middleware(['api', 'auth', 'core', 'multitenant'])
    ->group(function () {
        Route::namespace('')
            ->prefix('mediaobjects')
            ->as('mediaobjects.')
            ->group(function () {
                Route::get('', MediaObjectsIndex::class)->name('index');
                Route::get('create', MediaObjectsCreate::class)->name('create');
                Route::post('', MediaObjectsStore::class)->name('store');
                Route::get('{media_object}/edit', MediaObjectsEdit::class)->name('edit');

                Route::patch('{media_object}', MediaObjectsUpdate::class)->name('update');

                Route::delete('{media_object}', MediaObjectsDestroy::class)->name('destroy');

                Route::get('initTable', MediaObjectsInitTable::class)->name('initTable');
                Route::get('tableData', MediaObjectsTableData::class)->name('tableData');
                Route::get('exportExcel', MediaObjectsExportExcel::class)->name('exportExcel');

                Route::get('options', MediaObjectsOptions::class)->name('options');
                Route::get('{media_object}', MediaObjectsShow::class)->name('show');
            });
    });

Route::middleware(['api', 'auth', 'core', 'multitenant'])
    ->group(function () {
        Route::namespace('')
            ->prefix('addrs')
            ->as('addrs.')
            ->group(function () {
                Route::get('', AddrsIndex::class)->name('index');
                Route::get('create', AddrsCreate::class)->name('create');
                Route::post('', AddrsStore::class)->name('store');
                Route::get('{addr}/edit', AddrsEdit::class)->name('edit');

                Route::patch('{addr}', AddrsUpdate::class)->name('update');

                Route::delete('{addr}', AddrsDestroy::class)->name('destroy');

                Route::get('initTable', AddrsInitTable::class)->name('initTable');
                Route::get('tableData', AddrsTableData::class)->name('tableData');
                Route::get('exportExcel', AddrsExportExcel::class)->name('exportExcel');

                Route::get('options', AddrsOptions::class)->name('options');
                Route::get('{addr}', AddrsShow::class)->name('show');
            });
    });

Route::middleware(['api', 'auth', 'core', 'multitenant'])
    ->group(function () {
        Route::namespace('')
            ->prefix('chan')
            ->as('chan.')
            ->group(function () {
                Route::get('', ChanIndex::class)->name('index');
                Route::get('create', ChanCreate::class)->name('create');
                Route::post('', ChanStore::class)->name('store');
                Route::get('{chan}/edit', ChanEdit::class)->name('edit');

                Route::patch('{chan}', ChanUpdate::class)->name('update');

                Route::delete('{chan}', ChanDestroy::class)->name('destroy');

                Route::get('initTable', ChanInitTable::class)->name('initTable');
                Route::get('tableData', ChanTableData::class)->name('tableData');
                Route::get('exportExcel', ChanExportExcel::class)->name('exportExcel');

                Route::get('options', ChanOptions::class)->name('options');
                Route::get('{chan}', ChanShow::class)->name('show');
            });
    });

Route::middleware(['api', 'auth', 'core', 'multitenant'])
    ->group(function () {
        Route::namespace('')
            ->prefix('familyevents')
            ->as('familyevents.')
            ->group(function () {
                Route::get('', FamilyeventsIndex::class)->name('index');
                Route::get('create', FamilyeventsCreate::class)->name('create');
                Route::post('', FamilyeventsStore::class)->name('store');
                Route::get('{familyEvent}/edit', FamilyeventsEdit::class)->name('edit');

                Route::patch('{familyEvent}', FamilyeventsUpdate::class)->name('update');

                Route::delete('{familyEvent}', FamilyeventsDestroy::class)->name('destroy');

                Route::get('initTable', FamilyeventsInitTable::class)->name('initTable');
                Route::get('tableData', FamilyeventsTableData::class)->name('tableData');
                Route::get('exportExcel', FamilyeventsExportExcel::class)->name('exportExcel');

                Route::get('options', FamilyeventsOptions::class)->name('options');
                Route::get('{familyEvent}', FamilyeventsShow::class)->name('show');
            });
    });

Route::middleware(['api', 'auth', 'core', 'multitenant'])
    ->group(function () {
        Route::namespace('')
            ->prefix('familyslugs')
            ->as('familyslugs.')
            ->group(function () {
                Route::get('', FamilyslugsIndex::class)->name('index');
                Route::get('create', FamilyslugsCreate::class)->name('create');
                Route::post('', FamilyslugsStore::class)->name('store');
                Route::get('{familySlgs}/edit', FamilyslugsEdit::class)->name('edit');

                Route::patch('{familySlgs}', FamilyslugsUpdate::class)->name('update');

                Route::delete('{familySlgs}', FamilyslugsDestroy::class)->name('destroy');

                Route::get('initTable', FamilyslugsInitTable::class)->name('initTable');
                Route::get('tableData', FamilyslugsTableData::class)->name('tableData');
                Route::get('exportExcel', FamilyslugsExportExcel::class)->name('exportExcel');

                Route::get('options', FamilyslugsOptions::class)->name('options');
                Route::get('{familySlgs}', FamilyslugsShow::class)->name('show');
            });
    });

Route::middleware(['api', 'auth', 'core', 'multitenant'])
    ->group(function () {
        Route::namespace('')
            ->prefix('personalias')
            ->as('personalias.')
            ->group(function () {
                Route::get('', PersonaliasIndex::class)->name('index');
                Route::get('create', PersonaliasCreate::class)->name('create');
                Route::post('', PersonaliasStore::class)->name('store');
                Route::get('{personAlia}/edit', PersonaliasEdit::class)->name('edit');

                Route::patch('{personAlia}', PersonaliasUpdate::class)->name('update');

                Route::delete('{personAlia}', PersonaliasDestroy::class)->name('destroy');

                Route::get('initTable', PersonaliasInitTable::class)->name('initTable');
                Route::get('tableData', PersonaliasTableData::class)->name('tableData');
                Route::get('exportExcel', PersonaliasExportExcel::class)->name('exportExcel');

                Route::get('options', PersonaliasOptions::class)->name('options');
                Route::get('{personAlia}', PersonaliasShow::class)->name('show');
            });
    });

Route::middleware(['api', 'auth', 'core', 'multitenant'])
    ->group(function () {
        Route::namespace('')
            ->prefix('personanci')
            ->as('personanci.')
            ->group(function () {
                Route::get('', PersonanciIndex::class)->name('index');
                Route::get('create', PersonanciCreate::class)->name('create');
                Route::post('', PersonanciStore::class)->name('store');
                Route::get('{personAnci}/edit', PersonanciEdit::class)->name('edit');

                Route::patch('{personAnci}', PersonanciUpdate::class)->name('update');

                Route::delete('{personAnci}', PersonanciDestroy::class)->name('destroy');

                Route::get('initTable', PersonanciInitTable::class)->name('initTable');
                Route::get('tableData', PersonanciTableData::class)->name('tableData');
                Route::get('exportExcel', PersonanciExportExcel::class)->name('exportExcel');

                Route::get('options', PersonanciOptions::class)->name('options');
                Route::get('{personAnci}', PersonanciShow::class)->name('show');
            });
    });

Route::middleware(['api', 'auth', 'core', 'multitenant'])
    ->group(function () {
        Route::namespace('')
            ->prefix('personasso')
            ->as('personasso.')
            ->group(function () {
                Route::get('', PersonassoIndex::class)->name('index');
                Route::get('create', PersonassoCreate::class)->name('create');
                Route::post('', PersonassoStore::class)->name('store');
                Route::get('{personAsso}/edit', PersonassoEdit::class)->name('edit');

                Route::patch('{personAsso}', PersonassoUpdate::class)->name('update');

                Route::delete('{personAsso}', PersonassoDestroy::class)->name('destroy');

                Route::get('initTable', PersonassoInitTable::class)->name('initTable');
                Route::get('tableData', PersonassoTableData::class)->name('tableData');
                Route::get('exportExcel', PersonassoExportExcel::class)->name('exportExcel');

                Route::get('options', PersonassoOptions::class)->name('options');
                Route::get('{personAsso}', PersonassoShow::class)->name('show');
            });
    });

Route::middleware(['api', 'auth', 'core', 'multitenant'])
    ->group(function () {
        Route::namespace('')
            ->prefix('personevent')
            ->as('personevent.')
            ->group(function () {
                Route::get('', PersoneventIndex::class)->name('index');
                Route::get('create', PersoneventCreate::class)->name('create');
                Route::post('', PersoneventStore::class)->name('store');
                Route::get('{personEvent}/edit', PersoneventEdit::class)->name('edit');

                Route::patch('{personEvent}', PersoneventUpdate::class)->name('update');

                Route::delete('{personEvent}', PersoneventDestroy::class)->name('destroy');

                Route::get('initTable', PersoneventInitTable::class)->name('initTable');
                Route::get('tableData', PersoneventTableData::class)->name('tableData');
                Route::get('exportExcel', PersoneventExportExcel::class)->name('exportExcel');

                Route::get('options', PersoneventOptions::class)->name('options');
                Route::get('{personEvent}', PersoneventShow::class)->name('show');
            });
    });

Route::middleware(['api', 'auth', 'core', 'multitenant'])
    ->group(function () {
        Route::namespace('')
            ->prefix('personlds')
            ->as('personlds.')
            ->group(function () {
                Route::get('', PersonldsIndex::class)->name('index');
                Route::get('create', PersonldsCreate::class)->name('create');
                Route::post('', PersonldsStore::class)->name('store');
                Route::get('{personLds}/edit', PersonldsEdit::class)->name('edit');

                Route::patch('{personLds}', PersonldsUpdate::class)->name('update');

                Route::delete('{personLds}', PersonldsDestroy::class)->name('destroy');

                Route::get('initTable', PersonldsInitTable::class)->name('initTable');
                Route::get('tableData', PersonldsTableData::class)->name('tableData');
                Route::get('exportExcel', PersonldsExportExcel::class)->name('exportExcel');

                Route::get('options', PersonldsOptions::class)->name('options');
                Route::get('{personLds}', PersonldsShow::class)->name('show');
            });
    });

Route::middleware(['api', 'auth', 'core', 'multitenant'])
    ->group(function () {
        Route::namespace('')
            ->prefix('refn')
            ->as('refn.')
            ->group(function () {
                Route::get('', RefnIndex::class)->name('index');
                Route::get('create', RefnCreate::class)->name('create');
                Route::post('', RefnStore::class)->name('store');
                Route::get('{refn}/edit', RefnEdit::class)->name('edit');

                Route::patch('{refn}', RefnUpdate::class)->name('update');

                Route::delete('{refn}', RefnDestroy::class)->name('destroy');

                Route::get('initTable', RefnInitTable::class)->name('initTable');
                Route::get('tableData', RefnTableData::class)->name('tableData');
                Route::get('exportExcel', RefnExportExcel::class)->name('exportExcel');

                Route::get('options', RefnOptions::class)->name('options');
                Route::get('{refn}', RefnShow::class)->name('show');
            });
    });

Route::middleware(['api', 'auth', 'core', 'multitenant'])
    ->group(function () {
        Route::namespace('')
            ->prefix('sourcedata')
            ->as('sourcedata.')
            ->group(function () {
                Route::get('', SourcedataIndex::class)->name('index');
                Route::get('create', SourcedataCreate::class)->name('create');
                Route::post('', SourcedataStore::class)->name('store');
                Route::get('{sourceData}/edit', SourcedataEdit::class)->name('edit');

                Route::patch('{sourceData}', SourcedataUpdate::class)->name('update');

                Route::delete('{sourceData}', SourcedataDestroy::class)->name('destroy');

                Route::get('initTable', SourcedataInitTable::class)->name('initTable');
                Route::get('tableData', SourcedataTableData::class)->name('tableData');
                Route::get('exportExcel', SourcedataExportExcel::class)->name('exportExcel');

                Route::get('options', SourcedataOptions::class)->name('options');
                Route::get('{sourceData}', SourcedataShow::class)->name('show');
            });
    });

Route::middleware(['api', 'auth', 'core', 'multitenant'])
    ->group(function () {
        Route::namespace('')
            ->prefix('sourcedataeven')
            ->as('sourcedataeven.')
            ->group(function () {
                Route::get('', SourcedataevenIndex::class)->name('index');
                Route::get('create', SourcedataevenCreate::class)->name('create');
                Route::post('', SourcedataevenStore::class)->name('store');
                Route::get('{sourceDataEven}/edit', SourcedataevenEdit::class)->name('edit');

                Route::patch('{sourceDataEven}', SourcedataevenUpdate::class)->name('update');

                Route::delete('{sourceDataEven}', SourcedataevenDestroy::class)->name('destroy');

                Route::get('initTable', SourcedataevenInitTable::class)->name('initTable');
                Route::get('tableData', SourcedataevenTableData::class)->name('tableData');
                Route::get('exportExcel', SourcedataevenExportExcel::class)->name('exportExcel');

                Route::get('options', SourcedataevenOptions::class)->name('options');
                Route::get('{sourceDataEven}', SourcedataevenShow::class)->name('show');
            });
    });

Route::middleware(['api', 'auth', 'core', 'multitenant'])
    ->group(function () {
        Route::namespace('')
            ->prefix('sourcerefeven')
            ->as('sourcerefeven.')
            ->group(function () {
                Route::get('', SourcerefevenIndex::class)->name('index');
                Route::get('create', SourcerefevenCreate::class)->name('create');
                Route::post('', SourcerefevenStore::class)->name('store');
                Route::get('{sourceRefEven}/edit', SourcerefevenEdit::class)->name('edit');

                Route::patch('{sourceRefEven}', SourcerefevenUpdate::class)->name('update');

                Route::delete('{sourceRefEven}', SourcerefevenDestroy::class)->name('destroy');

                Route::get('initTable', SourcerefevenInitTable::class)->name('initTable');
                Route::get('tableData', SourcerefevenTableData::class)->name('tableData');
                Route::get('exportExcel', SourcerefevenExportExcel::class)->name('exportExcel');

                Route::get('options', SourcerefevenOptions::class)->name('options');
                Route::get('{sourceRefEven}', SourcerefevenShow::class)->name('show');
            });
    });

Route::middleware(['api', 'auth', 'core', 'multitenant'])
    ->group(function () {
        Route::namespace('')
            ->prefix('subm')
            ->as('subm.')
            ->group(function () {
                Route::get('', SubmIndex::class)->name('index');
                Route::get('create', SubmCreate::class)->name('create');
                Route::post('', SubmStore::class)->name('store');
                Route::get('{subm}/edit', SubmEdit::class)->name('edit');

                Route::patch('{subm}', SubmUpdate::class)->name('update');

                Route::delete('{subm}', SubmDestroy::class)->name('destroy');

                Route::get('initTable', SubmInitTable::class)->name('initTable');
                Route::get('tableData', SubmTableData::class)->name('tableData');
                Route::get('exportExcel', SubmExportExcel::class)->name('exportExcel');

                Route::get('options', SubmOptions::class)->name('options');
                Route::get('{subm}', SubmShow::class)->name('show');
            });
    });

Route::middleware(['api', 'auth', 'core', 'multitenant'])
    ->group(function () {
        Route::namespace('')
            ->prefix('subn')
            ->as('subn.')
            ->group(function () {
                Route::get('', SubnIndex::class)->name('index');
                Route::get('create', SubnCreate::class)->name('create');
                Route::post('', SubnStore::class)->name('store');
                Route::get('{subn}/edit', SubnEdit::class)->name('edit');

                Route::patch('{subn}', SubnUpdate::class)->name('update');

                Route::delete('{subn}', SubnDestroy::class)->name('destroy');

                Route::get('initTable', SubnInitTable::class)->name('initTable');
                Route::get('tableData', SubnTableData::class)->name('tableData');
                Route::get('exportExcel', SubnExportExcel::class)->name('exportExcel');

                Route::get('options', SubnOptions::class)->name('options');
                Route::get('{subn}', SubnShow::class)->name('show');
            });
    });

Route::middleware(['api', 'auth', 'core', 'multitenant'])
    ->group(function () {
        Route::namespace('')
            ->prefix('personsubm')
            ->as('personsubm.')
            ->group(function () {
                Route::get('', PersonSubmIndex::class)->name('index');
                Route::get('create', PersonSubmCreate::class)->name('create');
                Route::post('', PersonSubmStore::class)->name('store');
                Route::get('{personSubm}/edit', PersonSubmEdit::class)->name('edit');

                Route::patch('{personSubm}', PersonSubmUpdate::class)->name('update');

                Route::delete('{personSubm}', PersonSubmDestroy::class)->name('destroy');

                Route::get('initTable', PersonSubmInitTable::class)->name('initTable');
                Route::get('tableData', PersonSubmTableData::class)->name('tableData');
                Route::get('exportExcel', PersonSubmExportExcel::class)->name('exportExcel');

                Route::get('options', PersonSubmOptions::class)->name('options');
                Route::get('{personSubm}', PersonSubmShow::class)->name('show');
            });
    });

Route::namespace('')
    ->middleware(['api', 'auth', 'core', 'multitenant'])
    ->prefix('administration/people')
    ->as('administration.people.')
    ->group(function () {
        Route::get('create', PeopleCreate::class)->name('create');
        Route::post('', PeopleStore::class)->name('store');
        Route::get('{person}/edit', PeopleEdit::class)->name('edit');
        Route::patch('{person}', PeopleUpdate::class)->name('update');
        Route::delete('{person}', PeopleDestroy::class)->name('destroy');

        Route::get('initTable', PeopleInitTable::class)->name('initTable');
        Route::get('tableData', PeopleTableData::class)->name('tableData');
        Route::get('exportExcel', PeopleExportExcel::class)->name('exportExcel');

        Route::get('options', PeopleOptions::class)->name('options');
    });

Route::namespace('')
    ->middleware(['api', 'auth', 'core', 'multitenant'])
    ->prefix('administration/companies')
    ->as('administration.companies.')
    ->group(function () {
        Route::get('create', CompanyCreate::class)->name('create');
        Route::post('', CompanyStore::class)->name('store');
        Route::get('{company}/edit', CompanyEdit::class)->name('edit');
        Route::patch('{company}', CompanyUpdate::class)->name('update');
        Route::delete('{company}', CompanyDestroy::class)->name('destroy');

        Route::get('initTable', CompanyInitTable::class)->name('initTable');
        Route::get('tableData', CompanyTableData::class)->name('tableData');
        Route::get('exportExcel', CompanyExportExcel::class)->name('exportExcel');

        Route::get('options', CompanyOptions::class)->name('options');
    });

Route::namespace('')
    ->middleware(['api', 'auth', 'core', 'multitenant'])
    ->prefix('administration/users')
    ->as('administration.users.')
    ->group(function () {
        Route::get('create', UserCreate::class)->name('create');
        Route::post('', UserStore::class)->name('store');
        Route::get('{user}/edit', UserEdit::class)->name('edit');
        Route::patch('{user}', UserUpdate::class)->name('update');
        Route::delete('{user}', UserDestroy::class)->name('destroy');

        Route::get('initTable', UserInitTable::class)->name('initTable');
        Route::get('tableData', UserTableData::class)->name('tableData');
        Route::get('exportExcel', UserExportExcel::class)->name('exportExcel');

        Route::get('options', UserOptions::class)->name('options');
    });

Route::namespace('')
    ->group(function () {
        Route::prefix('people')
            ->as('people.')
            ->group(function () {
                Route::get('{company}', PeopleCompany::class)->name('index');
                Route::get('{company}/create', PeopleCompanyCreate::class)->name('create');
                Route::get('{company}/{person}/edit', PeopleCompanyEdit::class)->name('edit');
                Route::patch('{person}', PeopleCompanyUpdate::class)->name('update');
                Route::post('', PeopleCompanyStore::class)->name('store');
                Route::delete('{company}/{person}', PeopleCompanyDestroy::class)->name('destroy');
            });
    });

Route::middleware(['api', 'auth', 'core', 'multitenant'])
    ->namespace('')
    ->prefix('api/core/calendar')
    ->as('core.calendar.')
    ->group(function () {
        Route::get('', CalendarIndex::class)->name('index');
        Route::get('create', CalendarCreate::class)->name('create');
        Route::post('', CalendarStore::class)->name('store');
        Route::get('{calendar}/edit', CalendarEdit::class)->name('edit');
        Route::patch('{calendar}', CalendarUpdate::class)->name('update');
        Route::delete('{calendar}', CalendarDestroy::class)->name('destroy');
        Route::get('options', CalendarOptions::class)->name('options');
    });

Route::namespace('')
    ->prefix('events')
    ->as('events.')
    ->group(function () {
        Route::get('', EventIndex::class)->name('index');
        Route::get('create', EventCreate::class)->name('create');
        Route::post('', EventStore::class)->name('store');
        Route::get('{event}/edit', EventEdit::class)->name('edit');
        Route::patch('{event}', EventUpdate::class)->name('update');
        Route::delete('{event}', EventDestroy::class)->name('destroy');
    });

Route::middleware(['api', 'auth', 'core'])
    ->prefix('api/core/addresses')->as('core.addresses.')
    ->group(function () {
        Route::get('localities', Localities::class)->name('localities');
        Route::get('regions', Regions::class)->name('regions');
        Route::get('', AddressIndex::class)->name('index');
        Route::get('create', AddressCreate::class)->name('create');
        Route::post('', AddressStore::class)->name('store');
        Route::get('options', AddressOptions::class)->name('options');
        Route::get('postcode', Postcode::class)->name('postcode');
        Route::get('{address}/edit', AddressEdit::class)->name('edit');
        Route::get('{address}/localize', AddressLocalize::class)->name('localize');
        Route::patch('{address}', AddressUpdate::class)->name('update');
        Route::delete('{address}', AddressDestroy::class)->name('destroy');

        Route::patch('makeDefault/{address}', AddressMakeDefault::class)->name('makeDefault');
        Route::patch('makeBilling/{address}', AddressMakeBilling::class)->name('makeBilling');
        Route::patch('makeShipping/{address}', AddressMakeShipping::class)->name('makeShipping');

        Route::get('{address}', AddressShow::class)->name('show');
    });

Route::name('api.controlPanel.')
    ->prefix('api/controlpanel')->as('controlpanel.')
    ->group(function () {
        Route::middleware(['api', 'auth', 'core'])
        ->group(function () {
            Route::get('statistics', ControlPanelStatistics::class)->name('statistics');
            Route::get('actions', ControlPanelActions::class)->name('actions');
            Route::any('{action}', ControlPanelAction::class)->name('action');
        });

        Route::middleware(['signed', 'bindings'])
            ->prefix('action')
            ->as('action.')
            ->group(fn () => Route::get('downloadLog', ControlPanelDownloadLog::class)->name('downloadLog'));
    });

Broadcast::routes(['middleware' => ['auth:sanctum']]);

Route::middleware(['web', 'auth'])
     ->namespace('')
     ->prefix('stripe')
     ->as('stripe.')
    ->group(function () {
        Route::get('current-subscription', StripeGetCurrentSubscription::class);
        Route::get('intent', StripeGetIntent::class);
        Route::get('plans', StripeGetPlans::class);
        Route::post('subscribe', StripeSubscribe::class);
        Route::post('unsubscribe', StripeUnsubscribe::class);
        Route::post('webhook', StripeWebhook::class);
    });

Route::middleware(['web', 'auth'])
    ->namespace('')
    ->prefix('paypal')
    ->as('paypal.')
    ->group(function () {
        Route::get('plans', PaypalGetPlans::class);
        Route::post('plans', PaypalCreatePlans::class);
        Route::post('products', PaypalCreateProduct::class);
        Route::post('subscribe', PaypalHandlePayment::class);
        Route::post('unsubscribe', PaypalUnsubscribe::class);
        Route::post('webhook', PaypalWebhook::class);
    });

Route::middleware(['auth', 'api'])
     ->group(function () {
        Route::get('get_companies', [CompanyIndex::class, 'getCompany']);
        Route::get('get_person', [PersonaliasIndex::class, 'getPerson']);
        Route::post('gedcom-export', GedcomExport::class);
    });
