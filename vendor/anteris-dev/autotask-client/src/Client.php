<?php

namespace Anteris\Autotask;

use Anteris\Autotask\API\ActionTypes\ActionTypeService;
use Anteris\Autotask\API\AdditionalInvoiceFieldValues\AdditionalInvoiceFieldValueService;
use Anteris\Autotask\API\Appointments\AppointmentService;
use Anteris\Autotask\API\AttachmentInfo\AttachmentInfoService;
use Anteris\Autotask\API\BillingCodes\BillingCodeService;
use Anteris\Autotask\API\BillingItemApprovalLevels\BillingItemApprovalLevelService;
use Anteris\Autotask\API\BillingItems\BillingItemService;
use Anteris\Autotask\API\ChangeOrderCharges\ChangeOrderChargeService;
use Anteris\Autotask\API\ChangeRequestLinks\ChangeRequestLinkService;
use Anteris\Autotask\API\ChecklistLibraries\ChecklistLibraryService;
use Anteris\Autotask\API\ChecklistLibraryChecklistItems\ChecklistLibraryChecklistItemService;
use Anteris\Autotask\API\ClassificationIcons\ClassificationIconService;
use Anteris\Autotask\API\ClientPortalUsers\ClientPortalUserService;
use Anteris\Autotask\API\ComanagedAssociations\ComanagedAssociationService;
use Anteris\Autotask\API\Companies\CompanyService;
use Anteris\Autotask\API\CompanyAlerts\CompanyAlertService;
use Anteris\Autotask\API\CompanyAttachments\CompanyAttachmentService;
use Anteris\Autotask\API\CompanyLocations\CompanyLocationService;
use Anteris\Autotask\API\CompanyNotes\CompanyNoteService;
use Anteris\Autotask\API\CompanySiteConfigurations\CompanySiteConfigurationService;
use Anteris\Autotask\API\CompanyTeams\CompanyTeamService;
use Anteris\Autotask\API\CompanyToDos\CompanyToDoService;
use Anteris\Autotask\API\CompanyWebhookExcludedResources\CompanyWebhookExcludedResourceService;
use Anteris\Autotask\API\CompanyWebhookFields\CompanyWebhookFieldService;
use Anteris\Autotask\API\CompanyWebhookUdfFields\CompanyWebhookUdfFieldService;
use Anteris\Autotask\API\CompanyWebhooks\CompanyWebhookService;
use Anteris\Autotask\API\ConfigurationItemBillingProductAssociations\ConfigurationItemBillingProductAssociationService;
use Anteris\Autotask\API\ConfigurationItemCategories\ConfigurationItemCategoryService;
use Anteris\Autotask\API\ConfigurationItemCategoryUdfAssociations\ConfigurationItemCategoryUdfAssociationService;
use Anteris\Autotask\API\ConfigurationItemExts\ConfigurationItemExtService;
use Anteris\Autotask\API\ConfigurationItemNotes\ConfigurationItemNoteService;
use Anteris\Autotask\API\ConfigurationItemTypes\ConfigurationItemTypeService;
use Anteris\Autotask\API\ConfigurationItems\ConfigurationItemService;
use Anteris\Autotask\API\ContactBillingProductAssociations\ContactBillingProductAssociationService;
use Anteris\Autotask\API\ContactGroupContacts\ContactGroupContactService;
use Anteris\Autotask\API\ContactGroups\ContactGroupService;
use Anteris\Autotask\API\ContactWebhookExcludedResources\ContactWebhookExcludedResourceService;
use Anteris\Autotask\API\ContactWebhookFields\ContactWebhookFieldService;
use Anteris\Autotask\API\ContactWebhookUdfFields\ContactWebhookUdfFieldService;
use Anteris\Autotask\API\ContactWebhooks\ContactWebhookService;
use Anteris\Autotask\API\Contacts\ContactService;
use Anteris\Autotask\API\ContractBillingRules\ContractBillingRuleService;
use Anteris\Autotask\API\ContractBlockHourFactors\ContractBlockHourFactorService;
use Anteris\Autotask\API\ContractBlocks\ContractBlockService;
use Anteris\Autotask\API\ContractCharges\ContractChargeService;
use Anteris\Autotask\API\ContractExclusionBillingCodes\ContractExclusionBillingCodeService;
use Anteris\Autotask\API\ContractExclusionRoles\ContractExclusionRoleService;
use Anteris\Autotask\API\ContractExclusionSetExcludedRoles\ContractExclusionSetExcludedRoleService;
use Anteris\Autotask\API\ContractExclusionSetExcludedWorkTypes\ContractExclusionSetExcludedWorkTypeService;
use Anteris\Autotask\API\ContractExclusionSets\ContractExclusionSetService;
use Anteris\Autotask\API\ContractMilestones\ContractMilestoneService;
use Anteris\Autotask\API\ContractNotes\ContractNoteService;
use Anteris\Autotask\API\ContractRates\ContractRateService;
use Anteris\Autotask\API\ContractRetainers\ContractRetainerService;
use Anteris\Autotask\API\ContractRoleCosts\ContractRoleCostService;
use Anteris\Autotask\API\ContractServiceAdjustments\ContractServiceAdjustmentService;
use Anteris\Autotask\API\ContractServiceBundleAdjustments\ContractServiceBundleAdjustmentService;
use Anteris\Autotask\API\ContractServiceBundleUnits\ContractServiceBundleUnitService;
use Anteris\Autotask\API\ContractServiceBundles\ContractServiceBundleService;
use Anteris\Autotask\API\ContractServiceUnits\ContractServiceUnitService;
use Anteris\Autotask\API\ContractServices\ContractServiceService;
use Anteris\Autotask\API\ContractTicketPurchases\ContractTicketPurchaseService;
use Anteris\Autotask\API\Contracts\ContractService;
use Anteris\Autotask\API\Countries\CountryService;
use Anteris\Autotask\API\Currencies\CurrencyService;
use Anteris\Autotask\API\Departments\DepartmentService;
use Anteris\Autotask\API\ExpenseItems\ExpenseItemService;
use Anteris\Autotask\API\ExpenseReports\ExpenseReportService;
use Anteris\Autotask\API\HolidaySets\HolidaySetService;
use Anteris\Autotask\API\Holidays\HolidayService;
use Anteris\Autotask\API\InternalLocationWithBusinessHours\InternalLocationWithBusinessHourService;
use Anteris\Autotask\API\InternalLocations\InternalLocationService;
use Anteris\Autotask\API\InventoryItemSerialNumbers\InventoryItemSerialNumberService;
use Anteris\Autotask\API\InventoryItems\InventoryItemService;
use Anteris\Autotask\API\InventoryLocations\InventoryLocationService;
use Anteris\Autotask\API\InventoryTransfers\InventoryTransferService;
use Anteris\Autotask\API\InvoiceTemplates\InvoiceTemplateService;
use Anteris\Autotask\API\Invoices\InvoiceService;
use Anteris\Autotask\API\NotificationHistory\NotificationHistoryService;
use Anteris\Autotask\API\Opportunities\OpportunityService;
use Anteris\Autotask\API\OpportunityAttachments\OpportunityAttachmentService;
use Anteris\Autotask\API\OrganizationalLevel1s\OrganizationalLevel1Service;
use Anteris\Autotask\API\OrganizationalLevel2s\OrganizationalLevel2Service;
use Anteris\Autotask\API\OrganizationalLevelAssociations\OrganizationalLevelAssociationService;
use Anteris\Autotask\API\OrganizationalResources\OrganizationalResourceService;
use Anteris\Autotask\API\PaymentTerms\PaymentTermService;
use Anteris\Autotask\API\Phases\PhaseService;
use Anteris\Autotask\API\PriceListMaterialCodes\PriceListMaterialCodeService;
use Anteris\Autotask\API\PriceListProductTiers\PriceListProductTierService;
use Anteris\Autotask\API\PriceListProducts\PriceListProductService;
use Anteris\Autotask\API\PriceListRoles\PriceListRoleService;
use Anteris\Autotask\API\PriceListServiceBundles\PriceListServiceBundleService;
use Anteris\Autotask\API\PriceListServices\PriceListServiceService;
use Anteris\Autotask\API\PriceListWorkTypeModifiers\PriceListWorkTypeModifierService;
use Anteris\Autotask\API\ProductNotes\ProductNoteService;
use Anteris\Autotask\API\ProductTiers\ProductTierService;
use Anteris\Autotask\API\ProductVendors\ProductVendorService;
use Anteris\Autotask\API\Products\ProductService;
use Anteris\Autotask\API\ProjectAttachments\ProjectAttachmentService;
use Anteris\Autotask\API\ProjectCharges\ProjectChargeService;
use Anteris\Autotask\API\ProjectNotes\ProjectNoteService;
use Anteris\Autotask\API\Projects\ProjectService;
use Anteris\Autotask\API\PurchaseApprovals\PurchaseApprovalService;
use Anteris\Autotask\API\PurchaseOrderItemReceiving\PurchaseOrderItemReceivingService;
use Anteris\Autotask\API\PurchaseOrderItems\PurchaseOrderItemService;
use Anteris\Autotask\API\PurchaseOrders\PurchaseOrderService;
use Anteris\Autotask\API\QuoteItems\QuoteItemService;
use Anteris\Autotask\API\QuoteLocations\QuoteLocationService;
use Anteris\Autotask\API\QuoteTemplates\QuoteTemplateService;
use Anteris\Autotask\API\Quotes\QuoteService;
use Anteris\Autotask\API\ResourceRoleDepartments\ResourceRoleDepartmentService;
use Anteris\Autotask\API\ResourceRoleQueues\ResourceRoleQueueService;
use Anteris\Autotask\API\ResourceRoles\ResourceRoleService;
use Anteris\Autotask\API\ResourceServiceDeskRoles\ResourceServiceDeskRoleService;
use Anteris\Autotask\API\ResourceSkills\ResourceSkillService;
use Anteris\Autotask\API\Resources\ResourceService;
use Anteris\Autotask\API\Roles\RoleService;
use Anteris\Autotask\API\SalesOrders\SalesOrderService;
use Anteris\Autotask\API\ServiceBundleServices\ServiceBundleServiceService;
use Anteris\Autotask\API\ServiceBundles\ServiceBundleService;
use Anteris\Autotask\API\ServiceCallTaskResources\ServiceCallTaskResourceService;
use Anteris\Autotask\API\ServiceCallTasks\ServiceCallTaskService;
use Anteris\Autotask\API\ServiceCallTicketResources\ServiceCallTicketResourceService;
use Anteris\Autotask\API\ServiceCallTickets\ServiceCallTicketService;
use Anteris\Autotask\API\ServiceCalls\ServiceCallService;
use Anteris\Autotask\API\ServiceLevelAgreementResults\ServiceLevelAgreementResultService;
use Anteris\Autotask\API\Services\ServiceService;
use Anteris\Autotask\API\ShippingTypes\ShippingTypeService;
use Anteris\Autotask\API\Skills\SkillService;
use Anteris\Autotask\API\SubscriptionPeriods\SubscriptionPeriodService;
use Anteris\Autotask\API\Subscriptions\SubscriptionService;
use Anteris\Autotask\API\SurveyResults\SurveyResultService;
use Anteris\Autotask\API\Surveys\SurveyService;
use Anteris\Autotask\API\TaskAttachments\TaskAttachmentService;
use Anteris\Autotask\API\TaskNotes\TaskNoteService;
use Anteris\Autotask\API\TaskPredecessors\TaskPredecessorService;
use Anteris\Autotask\API\TaskSecondaryResources\TaskSecondaryResourceService;
use Anteris\Autotask\API\Tasks\TaskService;
use Anteris\Autotask\API\TaxCategories\TaxCategoryService;
use Anteris\Autotask\API\TaxRegions\TaxRegionService;
use Anteris\Autotask\API\Taxes\TaxService;
use Anteris\Autotask\API\TicketAdditionalConfigurationItems\TicketAdditionalConfigurationItemService;
use Anteris\Autotask\API\TicketAdditionalContacts\TicketAdditionalContactService;
use Anteris\Autotask\API\TicketAttachments\TicketAttachmentService;
use Anteris\Autotask\API\TicketCategories\TicketCategoryService;
use Anteris\Autotask\API\TicketCategoryFieldDefaults\TicketCategoryFieldDefaultService;
use Anteris\Autotask\API\TicketChangeRequestApprovals\TicketChangeRequestApprovalService;
use Anteris\Autotask\API\TicketCharges\TicketChargeService;
use Anteris\Autotask\API\TicketChecklistItems\TicketChecklistItemService;
use Anteris\Autotask\API\TicketChecklistLibraries\TicketChecklistLibraryService;
use Anteris\Autotask\API\TicketHistory\TicketHistoryService;
use Anteris\Autotask\API\TicketNotes\TicketNoteService;
use Anteris\Autotask\API\TicketRmaCredits\TicketRmaCreditService;
use Anteris\Autotask\API\TicketSecondaryResources\TicketSecondaryResourceService;
use Anteris\Autotask\API\Tickets\TicketService;
use Anteris\Autotask\API\TimeEntries\TimeEntryService;
use Anteris\Autotask\API\UserDefinedFieldDefinitions\UserDefinedFieldDefinitionService;
use Anteris\Autotask\API\UserDefinedFieldListItems\UserDefinedFieldListItemService;
use Anteris\Autotask\API\WebhookEventErrorLogs\WebhookEventErrorLogService;
use Anteris\Autotask\API\WorkTypeModifiers\WorkTypeModifierService;

class Client
{
    /** @var array Stores an instance of each class when created for faster performance. */
    protected array $classCache = [];

    /** @var HttpClient A minimal HTTP client to be passed to each service class. */
    protected HttpClient $client;

    /**
     * Creates a new HTTP client with headers to authenticate with Autotask.
     *
     * @param  string  $username         Autotask API user's username.
     * @param  string  $secret           Autotask API user's password.
     * @param  string  $integrationCode  Autotask API user's integration code.
     * @param  string  $baseUri          Autotask API URL.
     */
    public function __construct(
        string $username,
        string $secret,
        string $integrationCode,
        string $baseUri
    )
    {
        $this->client = new HttpClient($username, $secret, $integrationCode, $baseUri);
    }

    /**
     * Handles any interaction with the ActionTypes endpoint.
     */
    public function actionTypes(): ActionTypeService
    {
        if (! isset($this->classCache['ActionTypes'])) {
            $this->classCache['ActionTypes'] = new ActionTypeService($this->client);
        }

        return $this->classCache['ActionTypes'];
    }

    /**
     * Handles any interaction with the AdditionalInvoiceFieldValues endpoint.
     */
    public function additionalInvoiceFieldValues(): AdditionalInvoiceFieldValueService
    {
        if (! isset($this->classCache['AdditionalInvoiceFieldValues'])) {
            $this->classCache['AdditionalInvoiceFieldValues'] = new AdditionalInvoiceFieldValueService($this->client);
        }

        return $this->classCache['AdditionalInvoiceFieldValues'];
    }

    /**
     * Handles any interaction with the Appointments endpoint.
     */
    public function appointments(): AppointmentService
    {
        if (! isset($this->classCache['Appointments'])) {
            $this->classCache['Appointments'] = new AppointmentService($this->client);
        }

        return $this->classCache['Appointments'];
    }

    /**
     * Handles any interaction with the AttachmentInfo endpoint.
     */
    public function attachmentInfo(): AttachmentInfoService
    {
        if (! isset($this->classCache['AttachmentInfo'])) {
            $this->classCache['AttachmentInfo'] = new AttachmentInfoService($this->client);
        }

        return $this->classCache['AttachmentInfo'];
    }

    /**
     * Handles any interaction with the BillingCodes endpoint.
     */
    public function billingCodes(): BillingCodeService
    {
        if (! isset($this->classCache['BillingCodes'])) {
            $this->classCache['BillingCodes'] = new BillingCodeService($this->client);
        }

        return $this->classCache['BillingCodes'];
    }

    /**
     * Handles any interaction with the BillingItemApprovalLevels endpoint.
     */
    public function billingItemApprovalLevels(): BillingItemApprovalLevelService
    {
        if (! isset($this->classCache['BillingItemApprovalLevels'])) {
            $this->classCache['BillingItemApprovalLevels'] = new BillingItemApprovalLevelService($this->client);
        }

        return $this->classCache['BillingItemApprovalLevels'];
    }

    /**
     * Handles any interaction with the BillingItems endpoint.
     */
    public function billingItems(): BillingItemService
    {
        if (! isset($this->classCache['BillingItems'])) {
            $this->classCache['BillingItems'] = new BillingItemService($this->client);
        }

        return $this->classCache['BillingItems'];
    }

    /**
     * Handles any interaction with the ChangeOrderCharges endpoint.
     */
    public function changeOrderCharges(): ChangeOrderChargeService
    {
        if (! isset($this->classCache['ChangeOrderCharges'])) {
            $this->classCache['ChangeOrderCharges'] = new ChangeOrderChargeService($this->client);
        }

        return $this->classCache['ChangeOrderCharges'];
    }

    /**
     * Handles any interaction with the ChangeRequestLinks endpoint.
     */
    public function changeRequestLinks(): ChangeRequestLinkService
    {
        if (! isset($this->classCache['ChangeRequestLinks'])) {
            $this->classCache['ChangeRequestLinks'] = new ChangeRequestLinkService($this->client);
        }

        return $this->classCache['ChangeRequestLinks'];
    }

    /**
     * Handles any interaction with the ChecklistLibraries endpoint.
     */
    public function checklistLibraries(): ChecklistLibraryService
    {
        if (! isset($this->classCache['ChecklistLibraries'])) {
            $this->classCache['ChecklistLibraries'] = new ChecklistLibraryService($this->client);
        }

        return $this->classCache['ChecklistLibraries'];
    }

    /**
     * Handles any interaction with the ChecklistLibraryChecklistItems endpoint.
     */
    public function checklistLibraryChecklistItems(): ChecklistLibraryChecklistItemService
    {
        if (! isset($this->classCache['ChecklistLibraryChecklistItems'])) {
            $this->classCache['ChecklistLibraryChecklistItems'] = new ChecklistLibraryChecklistItemService($this->client);
        }

        return $this->classCache['ChecklistLibraryChecklistItems'];
    }

    /**
     * Handles any interaction with the ClassificationIcons endpoint.
     */
    public function classificationIcons(): ClassificationIconService
    {
        if (! isset($this->classCache['ClassificationIcons'])) {
            $this->classCache['ClassificationIcons'] = new ClassificationIconService($this->client);
        }

        return $this->classCache['ClassificationIcons'];
    }

    /**
     * Handles any interaction with the ClientPortalUsers endpoint.
     */
    public function clientPortalUsers(): ClientPortalUserService
    {
        if (! isset($this->classCache['ClientPortalUsers'])) {
            $this->classCache['ClientPortalUsers'] = new ClientPortalUserService($this->client);
        }

        return $this->classCache['ClientPortalUsers'];
    }

    /**
     * Handles any interaction with the ComanagedAssociations endpoint.
     */
    public function comanagedAssociations(): ComanagedAssociationService
    {
        if (! isset($this->classCache['ComanagedAssociations'])) {
            $this->classCache['ComanagedAssociations'] = new ComanagedAssociationService($this->client);
        }

        return $this->classCache['ComanagedAssociations'];
    }

    /**
     * Handles any interaction with the Companies endpoint.
     */
    public function companies(): CompanyService
    {
        if (! isset($this->classCache['Companies'])) {
            $this->classCache['Companies'] = new CompanyService($this->client);
        }

        return $this->classCache['Companies'];
    }

    /**
     * Handles any interaction with the CompanyAlerts endpoint.
     */
    public function companyAlerts(): CompanyAlertService
    {
        if (! isset($this->classCache['CompanyAlerts'])) {
            $this->classCache['CompanyAlerts'] = new CompanyAlertService($this->client);
        }

        return $this->classCache['CompanyAlerts'];
    }

    /**
     * Handles any interaction with the CompanyAttachments endpoint.
     */
    public function companyAttachments(): CompanyAttachmentService
    {
        if (! isset($this->classCache['CompanyAttachments'])) {
            $this->classCache['CompanyAttachments'] = new CompanyAttachmentService($this->client);
        }

        return $this->classCache['CompanyAttachments'];
    }

    /**
     * Handles any interaction with the CompanyLocations endpoint.
     */
    public function companyLocations(): CompanyLocationService
    {
        if (! isset($this->classCache['CompanyLocations'])) {
            $this->classCache['CompanyLocations'] = new CompanyLocationService($this->client);
        }

        return $this->classCache['CompanyLocations'];
    }

    /**
     * Handles any interaction with the CompanyNotes endpoint.
     */
    public function companyNotes(): CompanyNoteService
    {
        if (! isset($this->classCache['CompanyNotes'])) {
            $this->classCache['CompanyNotes'] = new CompanyNoteService($this->client);
        }

        return $this->classCache['CompanyNotes'];
    }

    /**
     * Handles any interaction with the CompanySiteConfigurations endpoint.
     */
    public function companySiteConfigurations(): CompanySiteConfigurationService
    {
        if (! isset($this->classCache['CompanySiteConfigurations'])) {
            $this->classCache['CompanySiteConfigurations'] = new CompanySiteConfigurationService($this->client);
        }

        return $this->classCache['CompanySiteConfigurations'];
    }

    /**
     * Handles any interaction with the CompanyTeams endpoint.
     */
    public function companyTeams(): CompanyTeamService
    {
        if (! isset($this->classCache['CompanyTeams'])) {
            $this->classCache['CompanyTeams'] = new CompanyTeamService($this->client);
        }

        return $this->classCache['CompanyTeams'];
    }

    /**
     * Handles any interaction with the CompanyToDos endpoint.
     */
    public function companyToDos(): CompanyToDoService
    {
        if (! isset($this->classCache['CompanyToDos'])) {
            $this->classCache['CompanyToDos'] = new CompanyToDoService($this->client);
        }

        return $this->classCache['CompanyToDos'];
    }

    /**
     * Handles any interaction with the CompanyWebhookExcludedResources endpoint.
     */
    public function companyWebhookExcludedResources(): CompanyWebhookExcludedResourceService
    {
        if (! isset($this->classCache['CompanyWebhookExcludedResources'])) {
            $this->classCache['CompanyWebhookExcludedResources'] = new CompanyWebhookExcludedResourceService($this->client);
        }

        return $this->classCache['CompanyWebhookExcludedResources'];
    }

    /**
     * Handles any interaction with the CompanyWebhookFields endpoint.
     */
    public function companyWebhookFields(): CompanyWebhookFieldService
    {
        if (! isset($this->classCache['CompanyWebhookFields'])) {
            $this->classCache['CompanyWebhookFields'] = new CompanyWebhookFieldService($this->client);
        }

        return $this->classCache['CompanyWebhookFields'];
    }

    /**
     * Handles any interaction with the CompanyWebhookUdfFields endpoint.
     */
    public function companyWebhookUdfFields(): CompanyWebhookUdfFieldService
    {
        if (! isset($this->classCache['CompanyWebhookUdfFields'])) {
            $this->classCache['CompanyWebhookUdfFields'] = new CompanyWebhookUdfFieldService($this->client);
        }

        return $this->classCache['CompanyWebhookUdfFields'];
    }

    /**
     * Handles any interaction with the CompanyWebhooks endpoint.
     */
    public function companyWebhooks(): CompanyWebhookService
    {
        if (! isset($this->classCache['CompanyWebhooks'])) {
            $this->classCache['CompanyWebhooks'] = new CompanyWebhookService($this->client);
        }

        return $this->classCache['CompanyWebhooks'];
    }

    /**
     * Handles any interaction with the ConfigurationItemBillingProductAssociations endpoint.
     */
    public function configurationItemBillingProductAssociations(): ConfigurationItemBillingProductAssociationService
    {
        if (! isset($this->classCache['ConfigurationItemBillingProductAssociations'])) {
            $this->classCache['ConfigurationItemBillingProductAssociations'] = new ConfigurationItemBillingProductAssociationService($this->client);
        }

        return $this->classCache['ConfigurationItemBillingProductAssociations'];
    }

    /**
     * Handles any interaction with the ConfigurationItemCategories endpoint.
     */
    public function configurationItemCategories(): ConfigurationItemCategoryService
    {
        if (! isset($this->classCache['ConfigurationItemCategories'])) {
            $this->classCache['ConfigurationItemCategories'] = new ConfigurationItemCategoryService($this->client);
        }

        return $this->classCache['ConfigurationItemCategories'];
    }

    /**
     * Handles any interaction with the ConfigurationItemCategoryUdfAssociations endpoint.
     */
    public function configurationItemCategoryUdfAssociations(): ConfigurationItemCategoryUdfAssociationService
    {
        if (! isset($this->classCache['ConfigurationItemCategoryUdfAssociations'])) {
            $this->classCache['ConfigurationItemCategoryUdfAssociations'] = new ConfigurationItemCategoryUdfAssociationService($this->client);
        }

        return $this->classCache['ConfigurationItemCategoryUdfAssociations'];
    }

    /**
     * Handles any interaction with the ConfigurationItemExts endpoint.
     */
    public function configurationItemExts(): ConfigurationItemExtService
    {
        if (! isset($this->classCache['ConfigurationItemExts'])) {
            $this->classCache['ConfigurationItemExts'] = new ConfigurationItemExtService($this->client);
        }

        return $this->classCache['ConfigurationItemExts'];
    }

    /**
     * Handles any interaction with the ConfigurationItemNotes endpoint.
     */
    public function configurationItemNotes(): ConfigurationItemNoteService
    {
        if (! isset($this->classCache['ConfigurationItemNotes'])) {
            $this->classCache['ConfigurationItemNotes'] = new ConfigurationItemNoteService($this->client);
        }

        return $this->classCache['ConfigurationItemNotes'];
    }

    /**
     * Handles any interaction with the ConfigurationItemTypes endpoint.
     */
    public function configurationItemTypes(): ConfigurationItemTypeService
    {
        if (! isset($this->classCache['ConfigurationItemTypes'])) {
            $this->classCache['ConfigurationItemTypes'] = new ConfigurationItemTypeService($this->client);
        }

        return $this->classCache['ConfigurationItemTypes'];
    }

    /**
     * Handles any interaction with the ConfigurationItems endpoint.
     */
    public function configurationItems(): ConfigurationItemService
    {
        if (! isset($this->classCache['ConfigurationItems'])) {
            $this->classCache['ConfigurationItems'] = new ConfigurationItemService($this->client);
        }

        return $this->classCache['ConfigurationItems'];
    }

    /**
     * Handles any interaction with the ContactBillingProductAssociations endpoint.
     */
    public function contactBillingProductAssociations(): ContactBillingProductAssociationService
    {
        if (! isset($this->classCache['ContactBillingProductAssociations'])) {
            $this->classCache['ContactBillingProductAssociations'] = new ContactBillingProductAssociationService($this->client);
        }

        return $this->classCache['ContactBillingProductAssociations'];
    }

    /**
     * Handles any interaction with the ContactGroupContacts endpoint.
     */
    public function contactGroupContacts(): ContactGroupContactService
    {
        if (! isset($this->classCache['ContactGroupContacts'])) {
            $this->classCache['ContactGroupContacts'] = new ContactGroupContactService($this->client);
        }

        return $this->classCache['ContactGroupContacts'];
    }

    /**
     * Handles any interaction with the ContactGroups endpoint.
     */
    public function contactGroups(): ContactGroupService
    {
        if (! isset($this->classCache['ContactGroups'])) {
            $this->classCache['ContactGroups'] = new ContactGroupService($this->client);
        }

        return $this->classCache['ContactGroups'];
    }

    /**
     * Handles any interaction with the ContactWebhookExcludedResources endpoint.
     */
    public function contactWebhookExcludedResources(): ContactWebhookExcludedResourceService
    {
        if (! isset($this->classCache['ContactWebhookExcludedResources'])) {
            $this->classCache['ContactWebhookExcludedResources'] = new ContactWebhookExcludedResourceService($this->client);
        }

        return $this->classCache['ContactWebhookExcludedResources'];
    }

    /**
     * Handles any interaction with the ContactWebhookFields endpoint.
     */
    public function contactWebhookFields(): ContactWebhookFieldService
    {
        if (! isset($this->classCache['ContactWebhookFields'])) {
            $this->classCache['ContactWebhookFields'] = new ContactWebhookFieldService($this->client);
        }

        return $this->classCache['ContactWebhookFields'];
    }

    /**
     * Handles any interaction with the ContactWebhookUdfFields endpoint.
     */
    public function contactWebhookUdfFields(): ContactWebhookUdfFieldService
    {
        if (! isset($this->classCache['ContactWebhookUdfFields'])) {
            $this->classCache['ContactWebhookUdfFields'] = new ContactWebhookUdfFieldService($this->client);
        }

        return $this->classCache['ContactWebhookUdfFields'];
    }

    /**
     * Handles any interaction with the ContactWebhooks endpoint.
     */
    public function contactWebhooks(): ContactWebhookService
    {
        if (! isset($this->classCache['ContactWebhooks'])) {
            $this->classCache['ContactWebhooks'] = new ContactWebhookService($this->client);
        }

        return $this->classCache['ContactWebhooks'];
    }

    /**
     * Handles any interaction with the Contacts endpoint.
     */
    public function contacts(): ContactService
    {
        if (! isset($this->classCache['Contacts'])) {
            $this->classCache['Contacts'] = new ContactService($this->client);
        }

        return $this->classCache['Contacts'];
    }

    /**
     * Handles any interaction with the ContractBillingRules endpoint.
     */
    public function contractBillingRules(): ContractBillingRuleService
    {
        if (! isset($this->classCache['ContractBillingRules'])) {
            $this->classCache['ContractBillingRules'] = new ContractBillingRuleService($this->client);
        }

        return $this->classCache['ContractBillingRules'];
    }

    /**
     * Handles any interaction with the ContractBlockHourFactors endpoint.
     */
    public function contractBlockHourFactors(): ContractBlockHourFactorService
    {
        if (! isset($this->classCache['ContractBlockHourFactors'])) {
            $this->classCache['ContractBlockHourFactors'] = new ContractBlockHourFactorService($this->client);
        }

        return $this->classCache['ContractBlockHourFactors'];
    }

    /**
     * Handles any interaction with the ContractBlocks endpoint.
     */
    public function contractBlocks(): ContractBlockService
    {
        if (! isset($this->classCache['ContractBlocks'])) {
            $this->classCache['ContractBlocks'] = new ContractBlockService($this->client);
        }

        return $this->classCache['ContractBlocks'];
    }

    /**
     * Handles any interaction with the ContractCharges endpoint.
     */
    public function contractCharges(): ContractChargeService
    {
        if (! isset($this->classCache['ContractCharges'])) {
            $this->classCache['ContractCharges'] = new ContractChargeService($this->client);
        }

        return $this->classCache['ContractCharges'];
    }

    /**
     * Handles any interaction with the ContractExclusionBillingCodes endpoint.
     */
    public function contractExclusionBillingCodes(): ContractExclusionBillingCodeService
    {
        if (! isset($this->classCache['ContractExclusionBillingCodes'])) {
            $this->classCache['ContractExclusionBillingCodes'] = new ContractExclusionBillingCodeService($this->client);
        }

        return $this->classCache['ContractExclusionBillingCodes'];
    }

    /**
     * Handles any interaction with the ContractExclusionRoles endpoint.
     */
    public function contractExclusionRoles(): ContractExclusionRoleService
    {
        if (! isset($this->classCache['ContractExclusionRoles'])) {
            $this->classCache['ContractExclusionRoles'] = new ContractExclusionRoleService($this->client);
        }

        return $this->classCache['ContractExclusionRoles'];
    }

    /**
     * Handles any interaction with the ContractExclusionSetExcludedRoles endpoint.
     */
    public function contractExclusionSetExcludedRoles(): ContractExclusionSetExcludedRoleService
    {
        if (! isset($this->classCache['ContractExclusionSetExcludedRoles'])) {
            $this->classCache['ContractExclusionSetExcludedRoles'] = new ContractExclusionSetExcludedRoleService($this->client);
        }

        return $this->classCache['ContractExclusionSetExcludedRoles'];
    }

    /**
     * Handles any interaction with the ContractExclusionSetExcludedWorkTypes endpoint.
     */
    public function contractExclusionSetExcludedWorkTypes(): ContractExclusionSetExcludedWorkTypeService
    {
        if (! isset($this->classCache['ContractExclusionSetExcludedWorkTypes'])) {
            $this->classCache['ContractExclusionSetExcludedWorkTypes'] = new ContractExclusionSetExcludedWorkTypeService($this->client);
        }

        return $this->classCache['ContractExclusionSetExcludedWorkTypes'];
    }

    /**
     * Handles any interaction with the ContractExclusionSets endpoint.
     */
    public function contractExclusionSets(): ContractExclusionSetService
    {
        if (! isset($this->classCache['ContractExclusionSets'])) {
            $this->classCache['ContractExclusionSets'] = new ContractExclusionSetService($this->client);
        }

        return $this->classCache['ContractExclusionSets'];
    }

    /**
     * Handles any interaction with the ContractMilestones endpoint.
     */
    public function contractMilestones(): ContractMilestoneService
    {
        if (! isset($this->classCache['ContractMilestones'])) {
            $this->classCache['ContractMilestones'] = new ContractMilestoneService($this->client);
        }

        return $this->classCache['ContractMilestones'];
    }

    /**
     * Handles any interaction with the ContractNotes endpoint.
     */
    public function contractNotes(): ContractNoteService
    {
        if (! isset($this->classCache['ContractNotes'])) {
            $this->classCache['ContractNotes'] = new ContractNoteService($this->client);
        }

        return $this->classCache['ContractNotes'];
    }

    /**
     * Handles any interaction with the ContractRates endpoint.
     */
    public function contractRates(): ContractRateService
    {
        if (! isset($this->classCache['ContractRates'])) {
            $this->classCache['ContractRates'] = new ContractRateService($this->client);
        }

        return $this->classCache['ContractRates'];
    }

    /**
     * Handles any interaction with the ContractRetainers endpoint.
     */
    public function contractRetainers(): ContractRetainerService
    {
        if (! isset($this->classCache['ContractRetainers'])) {
            $this->classCache['ContractRetainers'] = new ContractRetainerService($this->client);
        }

        return $this->classCache['ContractRetainers'];
    }

    /**
     * Handles any interaction with the ContractRoleCosts endpoint.
     */
    public function contractRoleCosts(): ContractRoleCostService
    {
        if (! isset($this->classCache['ContractRoleCosts'])) {
            $this->classCache['ContractRoleCosts'] = new ContractRoleCostService($this->client);
        }

        return $this->classCache['ContractRoleCosts'];
    }

    /**
     * Handles any interaction with the ContractServiceAdjustments endpoint.
     */
    public function contractServiceAdjustments(): ContractServiceAdjustmentService
    {
        if (! isset($this->classCache['ContractServiceAdjustments'])) {
            $this->classCache['ContractServiceAdjustments'] = new ContractServiceAdjustmentService($this->client);
        }

        return $this->classCache['ContractServiceAdjustments'];
    }

    /**
     * Handles any interaction with the ContractServiceBundleAdjustments endpoint.
     */
    public function contractServiceBundleAdjustments(): ContractServiceBundleAdjustmentService
    {
        if (! isset($this->classCache['ContractServiceBundleAdjustments'])) {
            $this->classCache['ContractServiceBundleAdjustments'] = new ContractServiceBundleAdjustmentService($this->client);
        }

        return $this->classCache['ContractServiceBundleAdjustments'];
    }

    /**
     * Handles any interaction with the ContractServiceBundleUnits endpoint.
     */
    public function contractServiceBundleUnits(): ContractServiceBundleUnitService
    {
        if (! isset($this->classCache['ContractServiceBundleUnits'])) {
            $this->classCache['ContractServiceBundleUnits'] = new ContractServiceBundleUnitService($this->client);
        }

        return $this->classCache['ContractServiceBundleUnits'];
    }

    /**
     * Handles any interaction with the ContractServiceBundles endpoint.
     */
    public function contractServiceBundles(): ContractServiceBundleService
    {
        if (! isset($this->classCache['ContractServiceBundles'])) {
            $this->classCache['ContractServiceBundles'] = new ContractServiceBundleService($this->client);
        }

        return $this->classCache['ContractServiceBundles'];
    }

    /**
     * Handles any interaction with the ContractServiceUnits endpoint.
     */
    public function contractServiceUnits(): ContractServiceUnitService
    {
        if (! isset($this->classCache['ContractServiceUnits'])) {
            $this->classCache['ContractServiceUnits'] = new ContractServiceUnitService($this->client);
        }

        return $this->classCache['ContractServiceUnits'];
    }

    /**
     * Handles any interaction with the ContractServices endpoint.
     */
    public function contractServices(): ContractServiceService
    {
        if (! isset($this->classCache['ContractServices'])) {
            $this->classCache['ContractServices'] = new ContractServiceService($this->client);
        }

        return $this->classCache['ContractServices'];
    }

    /**
     * Handles any interaction with the ContractTicketPurchases endpoint.
     */
    public function contractTicketPurchases(): ContractTicketPurchaseService
    {
        if (! isset($this->classCache['ContractTicketPurchases'])) {
            $this->classCache['ContractTicketPurchases'] = new ContractTicketPurchaseService($this->client);
        }

        return $this->classCache['ContractTicketPurchases'];
    }

    /**
     * Handles any interaction with the Contracts endpoint.
     */
    public function contracts(): ContractService
    {
        if (! isset($this->classCache['Contracts'])) {
            $this->classCache['Contracts'] = new ContractService($this->client);
        }

        return $this->classCache['Contracts'];
    }

    /**
     * Handles any interaction with the Countries endpoint.
     */
    public function countries(): CountryService
    {
        if (! isset($this->classCache['Countries'])) {
            $this->classCache['Countries'] = new CountryService($this->client);
        }

        return $this->classCache['Countries'];
    }

    /**
     * Handles any interaction with the Currencies endpoint.
     */
    public function currencies(): CurrencyService
    {
        if (! isset($this->classCache['Currencies'])) {
            $this->classCache['Currencies'] = new CurrencyService($this->client);
        }

        return $this->classCache['Currencies'];
    }

    /**
     * Handles any interaction with the Departments endpoint.
     */
    public function departments(): DepartmentService
    {
        if (! isset($this->classCache['Departments'])) {
            $this->classCache['Departments'] = new DepartmentService($this->client);
        }

        return $this->classCache['Departments'];
    }

    /**
     * Handles any interaction with the ExpenseItems endpoint.
     */
    public function expenseItems(): ExpenseItemService
    {
        if (! isset($this->classCache['ExpenseItems'])) {
            $this->classCache['ExpenseItems'] = new ExpenseItemService($this->client);
        }

        return $this->classCache['ExpenseItems'];
    }

    /**
     * Handles any interaction with the ExpenseReports endpoint.
     */
    public function expenseReports(): ExpenseReportService
    {
        if (! isset($this->classCache['ExpenseReports'])) {
            $this->classCache['ExpenseReports'] = new ExpenseReportService($this->client);
        }

        return $this->classCache['ExpenseReports'];
    }

    /**
     * Handles any interaction with the HolidaySets endpoint.
     */
    public function holidaySets(): HolidaySetService
    {
        if (! isset($this->classCache['HolidaySets'])) {
            $this->classCache['HolidaySets'] = new HolidaySetService($this->client);
        }

        return $this->classCache['HolidaySets'];
    }

    /**
     * Handles any interaction with the Holidays endpoint.
     */
    public function holidays(): HolidayService
    {
        if (! isset($this->classCache['Holidays'])) {
            $this->classCache['Holidays'] = new HolidayService($this->client);
        }

        return $this->classCache['Holidays'];
    }

    /**
     * Handles any interaction with the InternalLocationWithBusinessHours endpoint.
     */
    public function internalLocationWithBusinessHours(): InternalLocationWithBusinessHourService
    {
        if (! isset($this->classCache['InternalLocationWithBusinessHours'])) {
            $this->classCache['InternalLocationWithBusinessHours'] = new InternalLocationWithBusinessHourService($this->client);
        }

        return $this->classCache['InternalLocationWithBusinessHours'];
    }

    /**
     * Handles any interaction with the InternalLocations endpoint.
     */
    public function internalLocations(): InternalLocationService
    {
        if (! isset($this->classCache['InternalLocations'])) {
            $this->classCache['InternalLocations'] = new InternalLocationService($this->client);
        }

        return $this->classCache['InternalLocations'];
    }

    /**
     * Handles any interaction with the InventoryItemSerialNumbers endpoint.
     */
    public function inventoryItemSerialNumbers(): InventoryItemSerialNumberService
    {
        if (! isset($this->classCache['InventoryItemSerialNumbers'])) {
            $this->classCache['InventoryItemSerialNumbers'] = new InventoryItemSerialNumberService($this->client);
        }

        return $this->classCache['InventoryItemSerialNumbers'];
    }

    /**
     * Handles any interaction with the InventoryItems endpoint.
     */
    public function inventoryItems(): InventoryItemService
    {
        if (! isset($this->classCache['InventoryItems'])) {
            $this->classCache['InventoryItems'] = new InventoryItemService($this->client);
        }

        return $this->classCache['InventoryItems'];
    }

    /**
     * Handles any interaction with the InventoryLocations endpoint.
     */
    public function inventoryLocations(): InventoryLocationService
    {
        if (! isset($this->classCache['InventoryLocations'])) {
            $this->classCache['InventoryLocations'] = new InventoryLocationService($this->client);
        }

        return $this->classCache['InventoryLocations'];
    }

    /**
     * Handles any interaction with the InventoryTransfers endpoint.
     */
    public function inventoryTransfers(): InventoryTransferService
    {
        if (! isset($this->classCache['InventoryTransfers'])) {
            $this->classCache['InventoryTransfers'] = new InventoryTransferService($this->client);
        }

        return $this->classCache['InventoryTransfers'];
    }

    /**
     * Handles any interaction with the InvoiceTemplates endpoint.
     */
    public function invoiceTemplates(): InvoiceTemplateService
    {
        if (! isset($this->classCache['InvoiceTemplates'])) {
            $this->classCache['InvoiceTemplates'] = new InvoiceTemplateService($this->client);
        }

        return $this->classCache['InvoiceTemplates'];
    }

    /**
     * Handles any interaction with the Invoices endpoint.
     */
    public function invoices(): InvoiceService
    {
        if (! isset($this->classCache['Invoices'])) {
            $this->classCache['Invoices'] = new InvoiceService($this->client);
        }

        return $this->classCache['Invoices'];
    }

    /**
     * Handles any interaction with the NotificationHistory endpoint.
     */
    public function notificationHistory(): NotificationHistoryService
    {
        if (! isset($this->classCache['NotificationHistory'])) {
            $this->classCache['NotificationHistory'] = new NotificationHistoryService($this->client);
        }

        return $this->classCache['NotificationHistory'];
    }

    /**
     * Handles any interaction with the Opportunities endpoint.
     */
    public function opportunities(): OpportunityService
    {
        if (! isset($this->classCache['Opportunities'])) {
            $this->classCache['Opportunities'] = new OpportunityService($this->client);
        }

        return $this->classCache['Opportunities'];
    }

    /**
     * Handles any interaction with the OpportunityAttachments endpoint.
     */
    public function opportunityAttachments(): OpportunityAttachmentService
    {
        if (! isset($this->classCache['OpportunityAttachments'])) {
            $this->classCache['OpportunityAttachments'] = new OpportunityAttachmentService($this->client);
        }

        return $this->classCache['OpportunityAttachments'];
    }

    /**
     * Handles any interaction with the OrganizationalLevel1s endpoint.
     */
    public function organizationalLevel1s(): OrganizationalLevel1Service
    {
        if (! isset($this->classCache['OrganizationalLevel1s'])) {
            $this->classCache['OrganizationalLevel1s'] = new OrganizationalLevel1Service($this->client);
        }

        return $this->classCache['OrganizationalLevel1s'];
    }

    /**
     * Handles any interaction with the OrganizationalLevel2s endpoint.
     */
    public function organizationalLevel2s(): OrganizationalLevel2Service
    {
        if (! isset($this->classCache['OrganizationalLevel2s'])) {
            $this->classCache['OrganizationalLevel2s'] = new OrganizationalLevel2Service($this->client);
        }

        return $this->classCache['OrganizationalLevel2s'];
    }

    /**
     * Handles any interaction with the OrganizationalLevelAssociations endpoint.
     */
    public function organizationalLevelAssociations(): OrganizationalLevelAssociationService
    {
        if (! isset($this->classCache['OrganizationalLevelAssociations'])) {
            $this->classCache['OrganizationalLevelAssociations'] = new OrganizationalLevelAssociationService($this->client);
        }

        return $this->classCache['OrganizationalLevelAssociations'];
    }

    /**
     * Handles any interaction with the OrganizationalResources endpoint.
     */
    public function organizationalResources(): OrganizationalResourceService
    {
        if (! isset($this->classCache['OrganizationalResources'])) {
            $this->classCache['OrganizationalResources'] = new OrganizationalResourceService($this->client);
        }

        return $this->classCache['OrganizationalResources'];
    }

    /**
     * Handles any interaction with the PaymentTerms endpoint.
     */
    public function paymentTerms(): PaymentTermService
    {
        if (! isset($this->classCache['PaymentTerms'])) {
            $this->classCache['PaymentTerms'] = new PaymentTermService($this->client);
        }

        return $this->classCache['PaymentTerms'];
    }

    /**
     * Handles any interaction with the Phases endpoint.
     */
    public function phases(): PhaseService
    {
        if (! isset($this->classCache['Phases'])) {
            $this->classCache['Phases'] = new PhaseService($this->client);
        }

        return $this->classCache['Phases'];
    }

    /**
     * Handles any interaction with the PriceListMaterialCodes endpoint.
     */
    public function priceListMaterialCodes(): PriceListMaterialCodeService
    {
        if (! isset($this->classCache['PriceListMaterialCodes'])) {
            $this->classCache['PriceListMaterialCodes'] = new PriceListMaterialCodeService($this->client);
        }

        return $this->classCache['PriceListMaterialCodes'];
    }

    /**
     * Handles any interaction with the PriceListProductTiers endpoint.
     */
    public function priceListProductTiers(): PriceListProductTierService
    {
        if (! isset($this->classCache['PriceListProductTiers'])) {
            $this->classCache['PriceListProductTiers'] = new PriceListProductTierService($this->client);
        }

        return $this->classCache['PriceListProductTiers'];
    }

    /**
     * Handles any interaction with the PriceListProducts endpoint.
     */
    public function priceListProducts(): PriceListProductService
    {
        if (! isset($this->classCache['PriceListProducts'])) {
            $this->classCache['PriceListProducts'] = new PriceListProductService($this->client);
        }

        return $this->classCache['PriceListProducts'];
    }

    /**
     * Handles any interaction with the PriceListRoles endpoint.
     */
    public function priceListRoles(): PriceListRoleService
    {
        if (! isset($this->classCache['PriceListRoles'])) {
            $this->classCache['PriceListRoles'] = new PriceListRoleService($this->client);
        }

        return $this->classCache['PriceListRoles'];
    }

    /**
     * Handles any interaction with the PriceListServiceBundles endpoint.
     */
    public function priceListServiceBundles(): PriceListServiceBundleService
    {
        if (! isset($this->classCache['PriceListServiceBundles'])) {
            $this->classCache['PriceListServiceBundles'] = new PriceListServiceBundleService($this->client);
        }

        return $this->classCache['PriceListServiceBundles'];
    }

    /**
     * Handles any interaction with the PriceListServices endpoint.
     */
    public function priceListServices(): PriceListServiceService
    {
        if (! isset($this->classCache['PriceListServices'])) {
            $this->classCache['PriceListServices'] = new PriceListServiceService($this->client);
        }

        return $this->classCache['PriceListServices'];
    }

    /**
     * Handles any interaction with the PriceListWorkTypeModifiers endpoint.
     */
    public function priceListWorkTypeModifiers(): PriceListWorkTypeModifierService
    {
        if (! isset($this->classCache['PriceListWorkTypeModifiers'])) {
            $this->classCache['PriceListWorkTypeModifiers'] = new PriceListWorkTypeModifierService($this->client);
        }

        return $this->classCache['PriceListWorkTypeModifiers'];
    }

    /**
     * Handles any interaction with the ProductNotes endpoint.
     */
    public function productNotes(): ProductNoteService
    {
        if (! isset($this->classCache['ProductNotes'])) {
            $this->classCache['ProductNotes'] = new ProductNoteService($this->client);
        }

        return $this->classCache['ProductNotes'];
    }

    /**
     * Handles any interaction with the ProductTiers endpoint.
     */
    public function productTiers(): ProductTierService
    {
        if (! isset($this->classCache['ProductTiers'])) {
            $this->classCache['ProductTiers'] = new ProductTierService($this->client);
        }

        return $this->classCache['ProductTiers'];
    }

    /**
     * Handles any interaction with the ProductVendors endpoint.
     */
    public function productVendors(): ProductVendorService
    {
        if (! isset($this->classCache['ProductVendors'])) {
            $this->classCache['ProductVendors'] = new ProductVendorService($this->client);
        }

        return $this->classCache['ProductVendors'];
    }

    /**
     * Handles any interaction with the Products endpoint.
     */
    public function products(): ProductService
    {
        if (! isset($this->classCache['Products'])) {
            $this->classCache['Products'] = new ProductService($this->client);
        }

        return $this->classCache['Products'];
    }

    /**
     * Handles any interaction with the ProjectAttachments endpoint.
     */
    public function projectAttachments(): ProjectAttachmentService
    {
        if (! isset($this->classCache['ProjectAttachments'])) {
            $this->classCache['ProjectAttachments'] = new ProjectAttachmentService($this->client);
        }

        return $this->classCache['ProjectAttachments'];
    }

    /**
     * Handles any interaction with the ProjectCharges endpoint.
     */
    public function projectCharges(): ProjectChargeService
    {
        if (! isset($this->classCache['ProjectCharges'])) {
            $this->classCache['ProjectCharges'] = new ProjectChargeService($this->client);
        }

        return $this->classCache['ProjectCharges'];
    }

    /**
     * Handles any interaction with the ProjectNotes endpoint.
     */
    public function projectNotes(): ProjectNoteService
    {
        if (! isset($this->classCache['ProjectNotes'])) {
            $this->classCache['ProjectNotes'] = new ProjectNoteService($this->client);
        }

        return $this->classCache['ProjectNotes'];
    }

    /**
     * Handles any interaction with the Projects endpoint.
     */
    public function projects(): ProjectService
    {
        if (! isset($this->classCache['Projects'])) {
            $this->classCache['Projects'] = new ProjectService($this->client);
        }

        return $this->classCache['Projects'];
    }

    /**
     * Handles any interaction with the PurchaseApprovals endpoint.
     */
    public function purchaseApprovals(): PurchaseApprovalService
    {
        if (! isset($this->classCache['PurchaseApprovals'])) {
            $this->classCache['PurchaseApprovals'] = new PurchaseApprovalService($this->client);
        }

        return $this->classCache['PurchaseApprovals'];
    }

    /**
     * Handles any interaction with the PurchaseOrderItemReceiving endpoint.
     */
    public function purchaseOrderItemReceiving(): PurchaseOrderItemReceivingService
    {
        if (! isset($this->classCache['PurchaseOrderItemReceiving'])) {
            $this->classCache['PurchaseOrderItemReceiving'] = new PurchaseOrderItemReceivingService($this->client);
        }

        return $this->classCache['PurchaseOrderItemReceiving'];
    }

    /**
     * Handles any interaction with the PurchaseOrderItems endpoint.
     */
    public function purchaseOrderItems(): PurchaseOrderItemService
    {
        if (! isset($this->classCache['PurchaseOrderItems'])) {
            $this->classCache['PurchaseOrderItems'] = new PurchaseOrderItemService($this->client);
        }

        return $this->classCache['PurchaseOrderItems'];
    }

    /**
     * Handles any interaction with the PurchaseOrders endpoint.
     */
    public function purchaseOrders(): PurchaseOrderService
    {
        if (! isset($this->classCache['PurchaseOrders'])) {
            $this->classCache['PurchaseOrders'] = new PurchaseOrderService($this->client);
        }

        return $this->classCache['PurchaseOrders'];
    }

    /**
     * Handles any interaction with the QuoteItems endpoint.
     */
    public function quoteItems(): QuoteItemService
    {
        if (! isset($this->classCache['QuoteItems'])) {
            $this->classCache['QuoteItems'] = new QuoteItemService($this->client);
        }

        return $this->classCache['QuoteItems'];
    }

    /**
     * Handles any interaction with the QuoteLocations endpoint.
     */
    public function quoteLocations(): QuoteLocationService
    {
        if (! isset($this->classCache['QuoteLocations'])) {
            $this->classCache['QuoteLocations'] = new QuoteLocationService($this->client);
        }

        return $this->classCache['QuoteLocations'];
    }

    /**
     * Handles any interaction with the QuoteTemplates endpoint.
     */
    public function quoteTemplates(): QuoteTemplateService
    {
        if (! isset($this->classCache['QuoteTemplates'])) {
            $this->classCache['QuoteTemplates'] = new QuoteTemplateService($this->client);
        }

        return $this->classCache['QuoteTemplates'];
    }

    /**
     * Handles any interaction with the Quotes endpoint.
     */
    public function quotes(): QuoteService
    {
        if (! isset($this->classCache['Quotes'])) {
            $this->classCache['Quotes'] = new QuoteService($this->client);
        }

        return $this->classCache['Quotes'];
    }

    /**
     * Handles any interaction with the ResourceRoleDepartments endpoint.
     */
    public function resourceRoleDepartments(): ResourceRoleDepartmentService
    {
        if (! isset($this->classCache['ResourceRoleDepartments'])) {
            $this->classCache['ResourceRoleDepartments'] = new ResourceRoleDepartmentService($this->client);
        }

        return $this->classCache['ResourceRoleDepartments'];
    }

    /**
     * Handles any interaction with the ResourceRoleQueues endpoint.
     */
    public function resourceRoleQueues(): ResourceRoleQueueService
    {
        if (! isset($this->classCache['ResourceRoleQueues'])) {
            $this->classCache['ResourceRoleQueues'] = new ResourceRoleQueueService($this->client);
        }

        return $this->classCache['ResourceRoleQueues'];
    }

    /**
     * Handles any interaction with the ResourceRoles endpoint.
     */
    public function resourceRoles(): ResourceRoleService
    {
        if (! isset($this->classCache['ResourceRoles'])) {
            $this->classCache['ResourceRoles'] = new ResourceRoleService($this->client);
        }

        return $this->classCache['ResourceRoles'];
    }

    /**
     * Handles any interaction with the ResourceServiceDeskRoles endpoint.
     */
    public function resourceServiceDeskRoles(): ResourceServiceDeskRoleService
    {
        if (! isset($this->classCache['ResourceServiceDeskRoles'])) {
            $this->classCache['ResourceServiceDeskRoles'] = new ResourceServiceDeskRoleService($this->client);
        }

        return $this->classCache['ResourceServiceDeskRoles'];
    }

    /**
     * Handles any interaction with the ResourceSkills endpoint.
     */
    public function resourceSkills(): ResourceSkillService
    {
        if (! isset($this->classCache['ResourceSkills'])) {
            $this->classCache['ResourceSkills'] = new ResourceSkillService($this->client);
        }

        return $this->classCache['ResourceSkills'];
    }

    /**
     * Handles any interaction with the Resources endpoint.
     */
    public function resources(): ResourceService
    {
        if (! isset($this->classCache['Resources'])) {
            $this->classCache['Resources'] = new ResourceService($this->client);
        }

        return $this->classCache['Resources'];
    }

    /**
     * Handles any interaction with the Roles endpoint.
     */
    public function roles(): RoleService
    {
        if (! isset($this->classCache['Roles'])) {
            $this->classCache['Roles'] = new RoleService($this->client);
        }

        return $this->classCache['Roles'];
    }

    /**
     * Handles any interaction with the SalesOrders endpoint.
     */
    public function salesOrders(): SalesOrderService
    {
        if (! isset($this->classCache['SalesOrders'])) {
            $this->classCache['SalesOrders'] = new SalesOrderService($this->client);
        }

        return $this->classCache['SalesOrders'];
    }

    /**
     * Handles any interaction with the ServiceBundleServices endpoint.
     */
    public function serviceBundleServices(): ServiceBundleServiceService
    {
        if (! isset($this->classCache['ServiceBundleServices'])) {
            $this->classCache['ServiceBundleServices'] = new ServiceBundleServiceService($this->client);
        }

        return $this->classCache['ServiceBundleServices'];
    }

    /**
     * Handles any interaction with the ServiceBundles endpoint.
     */
    public function serviceBundles(): ServiceBundleService
    {
        if (! isset($this->classCache['ServiceBundles'])) {
            $this->classCache['ServiceBundles'] = new ServiceBundleService($this->client);
        }

        return $this->classCache['ServiceBundles'];
    }

    /**
     * Handles any interaction with the ServiceCallTaskResources endpoint.
     */
    public function serviceCallTaskResources(): ServiceCallTaskResourceService
    {
        if (! isset($this->classCache['ServiceCallTaskResources'])) {
            $this->classCache['ServiceCallTaskResources'] = new ServiceCallTaskResourceService($this->client);
        }

        return $this->classCache['ServiceCallTaskResources'];
    }

    /**
     * Handles any interaction with the ServiceCallTasks endpoint.
     */
    public function serviceCallTasks(): ServiceCallTaskService
    {
        if (! isset($this->classCache['ServiceCallTasks'])) {
            $this->classCache['ServiceCallTasks'] = new ServiceCallTaskService($this->client);
        }

        return $this->classCache['ServiceCallTasks'];
    }

    /**
     * Handles any interaction with the ServiceCallTicketResources endpoint.
     */
    public function serviceCallTicketResources(): ServiceCallTicketResourceService
    {
        if (! isset($this->classCache['ServiceCallTicketResources'])) {
            $this->classCache['ServiceCallTicketResources'] = new ServiceCallTicketResourceService($this->client);
        }

        return $this->classCache['ServiceCallTicketResources'];
    }

    /**
     * Handles any interaction with the ServiceCallTickets endpoint.
     */
    public function serviceCallTickets(): ServiceCallTicketService
    {
        if (! isset($this->classCache['ServiceCallTickets'])) {
            $this->classCache['ServiceCallTickets'] = new ServiceCallTicketService($this->client);
        }

        return $this->classCache['ServiceCallTickets'];
    }

    /**
     * Handles any interaction with the ServiceCalls endpoint.
     */
    public function serviceCalls(): ServiceCallService
    {
        if (! isset($this->classCache['ServiceCalls'])) {
            $this->classCache['ServiceCalls'] = new ServiceCallService($this->client);
        }

        return $this->classCache['ServiceCalls'];
    }

    /**
     * Handles any interaction with the ServiceLevelAgreementResults endpoint.
     */
    public function serviceLevelAgreementResults(): ServiceLevelAgreementResultService
    {
        if (! isset($this->classCache['ServiceLevelAgreementResults'])) {
            $this->classCache['ServiceLevelAgreementResults'] = new ServiceLevelAgreementResultService($this->client);
        }

        return $this->classCache['ServiceLevelAgreementResults'];
    }

    /**
     * Handles any interaction with the Services endpoint.
     */
    public function services(): ServiceService
    {
        if (! isset($this->classCache['Services'])) {
            $this->classCache['Services'] = new ServiceService($this->client);
        }

        return $this->classCache['Services'];
    }

    /**
     * Handles any interaction with the ShippingTypes endpoint.
     */
    public function shippingTypes(): ShippingTypeService
    {
        if (! isset($this->classCache['ShippingTypes'])) {
            $this->classCache['ShippingTypes'] = new ShippingTypeService($this->client);
        }

        return $this->classCache['ShippingTypes'];
    }

    /**
     * Handles any interaction with the Skills endpoint.
     */
    public function skills(): SkillService
    {
        if (! isset($this->classCache['Skills'])) {
            $this->classCache['Skills'] = new SkillService($this->client);
        }

        return $this->classCache['Skills'];
    }

    /**
     * Handles any interaction with the SubscriptionPeriods endpoint.
     */
    public function subscriptionPeriods(): SubscriptionPeriodService
    {
        if (! isset($this->classCache['SubscriptionPeriods'])) {
            $this->classCache['SubscriptionPeriods'] = new SubscriptionPeriodService($this->client);
        }

        return $this->classCache['SubscriptionPeriods'];
    }

    /**
     * Handles any interaction with the Subscriptions endpoint.
     */
    public function subscriptions(): SubscriptionService
    {
        if (! isset($this->classCache['Subscriptions'])) {
            $this->classCache['Subscriptions'] = new SubscriptionService($this->client);
        }

        return $this->classCache['Subscriptions'];
    }

    /**
     * Handles any interaction with the SurveyResults endpoint.
     */
    public function surveyResults(): SurveyResultService
    {
        if (! isset($this->classCache['SurveyResults'])) {
            $this->classCache['SurveyResults'] = new SurveyResultService($this->client);
        }

        return $this->classCache['SurveyResults'];
    }

    /**
     * Handles any interaction with the Surveys endpoint.
     */
    public function surveys(): SurveyService
    {
        if (! isset($this->classCache['Surveys'])) {
            $this->classCache['Surveys'] = new SurveyService($this->client);
        }

        return $this->classCache['Surveys'];
    }

    /**
     * Handles any interaction with the TaskAttachments endpoint.
     */
    public function taskAttachments(): TaskAttachmentService
    {
        if (! isset($this->classCache['TaskAttachments'])) {
            $this->classCache['TaskAttachments'] = new TaskAttachmentService($this->client);
        }

        return $this->classCache['TaskAttachments'];
    }

    /**
     * Handles any interaction with the TaskNotes endpoint.
     */
    public function taskNotes(): TaskNoteService
    {
        if (! isset($this->classCache['TaskNotes'])) {
            $this->classCache['TaskNotes'] = new TaskNoteService($this->client);
        }

        return $this->classCache['TaskNotes'];
    }

    /**
     * Handles any interaction with the TaskPredecessors endpoint.
     */
    public function taskPredecessors(): TaskPredecessorService
    {
        if (! isset($this->classCache['TaskPredecessors'])) {
            $this->classCache['TaskPredecessors'] = new TaskPredecessorService($this->client);
        }

        return $this->classCache['TaskPredecessors'];
    }

    /**
     * Handles any interaction with the TaskSecondaryResources endpoint.
     */
    public function taskSecondaryResources(): TaskSecondaryResourceService
    {
        if (! isset($this->classCache['TaskSecondaryResources'])) {
            $this->classCache['TaskSecondaryResources'] = new TaskSecondaryResourceService($this->client);
        }

        return $this->classCache['TaskSecondaryResources'];
    }

    /**
     * Handles any interaction with the Tasks endpoint.
     */
    public function tasks(): TaskService
    {
        if (! isset($this->classCache['Tasks'])) {
            $this->classCache['Tasks'] = new TaskService($this->client);
        }

        return $this->classCache['Tasks'];
    }

    /**
     * Handles any interaction with the TaxCategories endpoint.
     */
    public function taxCategories(): TaxCategoryService
    {
        if (! isset($this->classCache['TaxCategories'])) {
            $this->classCache['TaxCategories'] = new TaxCategoryService($this->client);
        }

        return $this->classCache['TaxCategories'];
    }

    /**
     * Handles any interaction with the TaxRegions endpoint.
     */
    public function taxRegions(): TaxRegionService
    {
        if (! isset($this->classCache['TaxRegions'])) {
            $this->classCache['TaxRegions'] = new TaxRegionService($this->client);
        }

        return $this->classCache['TaxRegions'];
    }

    /**
     * Handles any interaction with the Taxes endpoint.
     */
    public function taxes(): TaxService
    {
        if (! isset($this->classCache['Taxes'])) {
            $this->classCache['Taxes'] = new TaxService($this->client);
        }

        return $this->classCache['Taxes'];
    }

    /**
     * Handles any interaction with the TicketAdditionalConfigurationItems endpoint.
     */
    public function ticketAdditionalConfigurationItems(): TicketAdditionalConfigurationItemService
    {
        if (! isset($this->classCache['TicketAdditionalConfigurationItems'])) {
            $this->classCache['TicketAdditionalConfigurationItems'] = new TicketAdditionalConfigurationItemService($this->client);
        }

        return $this->classCache['TicketAdditionalConfigurationItems'];
    }

    /**
     * Handles any interaction with the TicketAdditionalContacts endpoint.
     */
    public function ticketAdditionalContacts(): TicketAdditionalContactService
    {
        if (! isset($this->classCache['TicketAdditionalContacts'])) {
            $this->classCache['TicketAdditionalContacts'] = new TicketAdditionalContactService($this->client);
        }

        return $this->classCache['TicketAdditionalContacts'];
    }

    /**
     * Handles any interaction with the TicketAttachments endpoint.
     */
    public function ticketAttachments(): TicketAttachmentService
    {
        if (! isset($this->classCache['TicketAttachments'])) {
            $this->classCache['TicketAttachments'] = new TicketAttachmentService($this->client);
        }

        return $this->classCache['TicketAttachments'];
    }

    /**
     * Handles any interaction with the TicketCategories endpoint.
     */
    public function ticketCategories(): TicketCategoryService
    {
        if (! isset($this->classCache['TicketCategories'])) {
            $this->classCache['TicketCategories'] = new TicketCategoryService($this->client);
        }

        return $this->classCache['TicketCategories'];
    }

    /**
     * Handles any interaction with the TicketCategoryFieldDefaults endpoint.
     */
    public function ticketCategoryFieldDefaults(): TicketCategoryFieldDefaultService
    {
        if (! isset($this->classCache['TicketCategoryFieldDefaults'])) {
            $this->classCache['TicketCategoryFieldDefaults'] = new TicketCategoryFieldDefaultService($this->client);
        }

        return $this->classCache['TicketCategoryFieldDefaults'];
    }

    /**
     * Handles any interaction with the TicketChangeRequestApprovals endpoint.
     */
    public function ticketChangeRequestApprovals(): TicketChangeRequestApprovalService
    {
        if (! isset($this->classCache['TicketChangeRequestApprovals'])) {
            $this->classCache['TicketChangeRequestApprovals'] = new TicketChangeRequestApprovalService($this->client);
        }

        return $this->classCache['TicketChangeRequestApprovals'];
    }

    /**
     * Handles any interaction with the TicketCharges endpoint.
     */
    public function ticketCharges(): TicketChargeService
    {
        if (! isset($this->classCache['TicketCharges'])) {
            $this->classCache['TicketCharges'] = new TicketChargeService($this->client);
        }

        return $this->classCache['TicketCharges'];
    }

    /**
     * Handles any interaction with the TicketChecklistItems endpoint.
     */
    public function ticketChecklistItems(): TicketChecklistItemService
    {
        if (! isset($this->classCache['TicketChecklistItems'])) {
            $this->classCache['TicketChecklistItems'] = new TicketChecklistItemService($this->client);
        }

        return $this->classCache['TicketChecklistItems'];
    }

    /**
     * Handles any interaction with the TicketChecklistLibraries endpoint.
     */
    public function ticketChecklistLibraries(): TicketChecklistLibraryService
    {
        if (! isset($this->classCache['TicketChecklistLibraries'])) {
            $this->classCache['TicketChecklistLibraries'] = new TicketChecklistLibraryService($this->client);
        }

        return $this->classCache['TicketChecklistLibraries'];
    }

    /**
     * Handles any interaction with the TicketHistory endpoint.
     */
    public function ticketHistory(): TicketHistoryService
    {
        if (! isset($this->classCache['TicketHistory'])) {
            $this->classCache['TicketHistory'] = new TicketHistoryService($this->client);
        }

        return $this->classCache['TicketHistory'];
    }

    /**
     * Handles any interaction with the TicketNotes endpoint.
     */
    public function ticketNotes(): TicketNoteService
    {
        if (! isset($this->classCache['TicketNotes'])) {
            $this->classCache['TicketNotes'] = new TicketNoteService($this->client);
        }

        return $this->classCache['TicketNotes'];
    }

    /**
     * Handles any interaction with the TicketRmaCredits endpoint.
     */
    public function ticketRmaCredits(): TicketRmaCreditService
    {
        if (! isset($this->classCache['TicketRmaCredits'])) {
            $this->classCache['TicketRmaCredits'] = new TicketRmaCreditService($this->client);
        }

        return $this->classCache['TicketRmaCredits'];
    }

    /**
     * Handles any interaction with the TicketSecondaryResources endpoint.
     */
    public function ticketSecondaryResources(): TicketSecondaryResourceService
    {
        if (! isset($this->classCache['TicketSecondaryResources'])) {
            $this->classCache['TicketSecondaryResources'] = new TicketSecondaryResourceService($this->client);
        }

        return $this->classCache['TicketSecondaryResources'];
    }

    /**
     * Handles any interaction with the Tickets endpoint.
     */
    public function tickets(): TicketService
    {
        if (! isset($this->classCache['Tickets'])) {
            $this->classCache['Tickets'] = new TicketService($this->client);
        }

        return $this->classCache['Tickets'];
    }

    /**
     * Handles any interaction with the TimeEntries endpoint.
     */
    public function timeEntries(): TimeEntryService
    {
        if (! isset($this->classCache['TimeEntries'])) {
            $this->classCache['TimeEntries'] = new TimeEntryService($this->client);
        }

        return $this->classCache['TimeEntries'];
    }

    /**
     * Handles any interaction with the UserDefinedFieldDefinitions endpoint.
     */
    public function userDefinedFieldDefinitions(): UserDefinedFieldDefinitionService
    {
        if (! isset($this->classCache['UserDefinedFieldDefinitions'])) {
            $this->classCache['UserDefinedFieldDefinitions'] = new UserDefinedFieldDefinitionService($this->client);
        }

        return $this->classCache['UserDefinedFieldDefinitions'];
    }

    /**
     * Handles any interaction with the UserDefinedFieldListItems endpoint.
     */
    public function userDefinedFieldListItems(): UserDefinedFieldListItemService
    {
        if (! isset($this->classCache['UserDefinedFieldListItems'])) {
            $this->classCache['UserDefinedFieldListItems'] = new UserDefinedFieldListItemService($this->client);
        }

        return $this->classCache['UserDefinedFieldListItems'];
    }

    /**
     * Handles any interaction with the WebhookEventErrorLogs endpoint.
     */
    public function webhookEventErrorLogs(): WebhookEventErrorLogService
    {
        if (! isset($this->classCache['WebhookEventErrorLogs'])) {
            $this->classCache['WebhookEventErrorLogs'] = new WebhookEventErrorLogService($this->client);
        }

        return $this->classCache['WebhookEventErrorLogs'];
    }

    /**
     * Handles any interaction with the WorkTypeModifiers endpoint.
     */
    public function workTypeModifiers(): WorkTypeModifierService
    {
        if (! isset($this->classCache['WorkTypeModifiers'])) {
            $this->classCache['WorkTypeModifiers'] = new WorkTypeModifierService($this->client);
        }

        return $this->classCache['WorkTypeModifiers'];
    }
}
