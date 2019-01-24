<?php
// This file was auto-generated from sdk-root/src/data/ec2/2016-11-15/api-2.json
return [ 'version' => '2.0', 'metadata' => [ 'apiVersion' => '2016-11-15', 'endpointPrefix' => 'ec2', 'protocol' => 'ec2', 'serviceAbbreviation' => 'Amazon EC2', 'serviceFullName' => 'Amazon Elastic Compute Cloud', 'serviceId' => 'EC2', 'signatureVersion' => 'v4', 'uid' => 'ec2-2016-11-15', 'xmlNamespace' => 'http://ec2.amazonaws.com/doc/2016-11-15', ], 'operations' => [ 'AcceptReservedInstancesExchangeQuote' => [ 'name' => 'AcceptReservedInstancesExchangeQuote', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'AcceptReservedInstancesExchangeQuoteRequest', ], 'output' => [ 'shape' => 'AcceptReservedInstancesExchangeQuoteResult', ], ], 'AcceptVpcEndpointConnections' => [ 'name' => 'AcceptVpcEndpointConnections', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'AcceptVpcEndpointConnectionsRequest', ], 'output' => [ 'shape' => 'AcceptVpcEndpointConnectionsResult', ], ], 'AcceptVpcPeeringConnection' => [ 'name' => 'AcceptVpcPeeringConnection', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'AcceptVpcPeeringConnectionRequest', ], 'output' => [ 'shape' => 'AcceptVpcPeeringConnectionResult', ], ], 'AllocateAddress' => [ 'name' => 'AllocateAddress', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'AllocateAddressRequest', ], 'output' => [ 'shape' => 'AllocateAddressResult', ], ], 'AllocateHosts' => [ 'name' => 'AllocateHosts', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'AllocateHostsRequest', ], 'output' => [ 'shape' => 'AllocateHostsResult', ], ], 'AssignIpv6Addresses' => [ 'name' => 'AssignIpv6Addresses', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'AssignIpv6AddressesRequest', ], 'output' => [ 'shape' => 'AssignIpv6AddressesResult', ], ], 'AssignPrivateIpAddresses' => [ 'name' => 'AssignPrivateIpAddresses', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'AssignPrivateIpAddressesRequest', ], ], 'AssociateAddress' => [ 'name' => 'AssociateAddress', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'AssociateAddressRequest', ], 'output' => [ 'shape' => 'AssociateAddressResult', ], ], 'AssociateDhcpOptions' => [ 'name' => 'AssociateDhcpOptions', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'AssociateDhcpOptionsRequest', ], ], 'AssociateIamInstanceProfile' => [ 'name' => 'AssociateIamInstanceProfile', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'AssociateIamInstanceProfileRequest', ], 'output' => [ 'shape' => 'AssociateIamInstanceProfileResult', ], ], 'AssociateRouteTable' => [ 'name' => 'AssociateRouteTable', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'AssociateRouteTableRequest', ], 'output' => [ 'shape' => 'AssociateRouteTableResult', ], ], 'AssociateSubnetCidrBlock' => [ 'name' => 'AssociateSubnetCidrBlock', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'AssociateSubnetCidrBlockRequest', ], 'output' => [ 'shape' => 'AssociateSubnetCidrBlockResult', ], ], 'AssociateVpcCidrBlock' => [ 'name' => 'AssociateVpcCidrBlock', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'AssociateVpcCidrBlockRequest', ], 'output' => [ 'shape' => 'AssociateVpcCidrBlockResult', ], ], 'AttachClassicLinkVpc' => [ 'name' => 'AttachClassicLinkVpc', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'AttachClassicLinkVpcRequest', ], 'output' => [ 'shape' => 'AttachClassicLinkVpcResult', ], ], 'AttachInternetGateway' => [ 'name' => 'AttachInternetGateway', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'AttachInternetGatewayRequest', ], ], 'AttachNetworkInterface' => [ 'name' => 'AttachNetworkInterface', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'AttachNetworkInterfaceRequest', ], 'output' => [ 'shape' => 'AttachNetworkInterfaceResult', ], ], 'AttachVolume' => [ 'name' => 'AttachVolume', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'AttachVolumeRequest', ], 'output' => [ 'shape' => 'VolumeAttachment', ], ], 'AttachVpnGateway' => [ 'name' => 'AttachVpnGateway', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'AttachVpnGatewayRequest', ], 'output' => [ 'shape' => 'AttachVpnGatewayResult', ], ], 'AuthorizeSecurityGroupEgress' => [ 'name' => 'AuthorizeSecurityGroupEgress', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'AuthorizeSecurityGroupEgressRequest', ], ], 'AuthorizeSecurityGroupIngress' => [ 'name' => 'AuthorizeSecurityGroupIngress', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'AuthorizeSecurityGroupIngressRequest', ], ], 'BundleInstance' => [ 'name' => 'BundleInstance', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'BundleInstanceRequest', ], 'output' => [ 'shape' => 'BundleInstanceResult', ], ], 'CancelBundleTask' => [ 'name' => 'CancelBundleTask', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'CancelBundleTaskRequest', ], 'output' => [ 'shape' => 'CancelBundleTaskResult', ], ], 'CancelConversionTask' => [ 'name' => 'CancelConversionTask', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'CancelConversionRequest', ], ], 'CancelExportTask' => [ 'name' => 'CancelExportTask', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'CancelExportTaskRequest', ], ], 'CancelImportTask' => [ 'name' => 'CancelImportTask', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'CancelImportTaskRequest', ], 'output' => [ 'shape' => 'CancelImportTaskResult', ], ], 'CancelReservedInstancesListing' => [ 'name' => 'CancelReservedInstancesListing', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'CancelReservedInstancesListingRequest', ], 'output' => [ 'shape' => 'CancelReservedInstancesListingResult', ], ], 'CancelSpotFleetRequests' => [ 'name' => 'CancelSpotFleetRequests', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'CancelSpotFleetRequestsRequest', ], 'output' => [ 'shape' => 'CancelSpotFleetRequestsResponse', ], ], 'CancelSpotInstanceRequests' => [ 'name' => 'CancelSpotInstanceRequests', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'CancelSpotInstanceRequestsRequest', ], 'output' => [ 'shape' => 'CancelSpotInstanceRequestsResult', ], ], 'ConfirmProductInstance' => [ 'name' => 'ConfirmProductInstance', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'ConfirmProductInstanceRequest', ], 'output' => [ 'shape' => 'ConfirmProductInstanceResult', ], ], 'CopyFpgaImage' => [ 'name' => 'CopyFpgaImage', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'CopyFpgaImageRequest', ], 'output' => [ 'shape' => 'CopyFpgaImageResult', ], ], 'CopyImage' => [ 'name' => 'CopyImage', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'CopyImageRequest', ], 'output' => [ 'shape' => 'CopyImageResult', ], ], 'CopySnapshot' => [ 'name' => 'CopySnapshot', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'CopySnapshotRequest', ], 'output' => [ 'shape' => 'CopySnapshotResult', ], ], 'CreateCustomerGateway' => [ 'name' => 'CreateCustomerGateway', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'CreateCustomerGatewayRequest', ], 'output' => [ 'shape' => 'CreateCustomerGatewayResult', ], ], 'CreateDefaultSubnet' => [ 'name' => 'CreateDefaultSubnet', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'CreateDefaultSubnetRequest', ], 'output' => [ 'shape' => 'CreateDefaultSubnetResult', ], ], 'CreateDefaultVpc' => [ 'name' => 'CreateDefaultVpc', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'CreateDefaultVpcRequest', ], 'output' => [ 'shape' => 'CreateDefaultVpcResult', ], ], 'CreateDhcpOptions' => [ 'name' => 'CreateDhcpOptions', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'CreateDhcpOptionsRequest', ], 'output' => [ 'shape' => 'CreateDhcpOptionsResult', ], ], 'CreateEgressOnlyInternetGateway' => [ 'name' => 'CreateEgressOnlyInternetGateway', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'CreateEgressOnlyInternetGatewayRequest', ], 'output' => [ 'shape' => 'CreateEgressOnlyInternetGatewayResult', ], ], 'CreateFleet' => [ 'name' => 'CreateFleet', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'CreateFleetRequest', ], 'output' => [ 'shape' => 'CreateFleetResult', ], ], 'CreateFlowLogs' => [ 'name' => 'CreateFlowLogs', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'CreateFlowLogsRequest', ], 'output' => [ 'shape' => 'CreateFlowLogsResult', ], ], 'CreateFpgaImage' => [ 'name' => 'CreateFpgaImage', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'CreateFpgaImageRequest', ], 'output' => [ 'shape' => 'CreateFpgaImageResult', ], ], 'CreateImage' => [ 'name' => 'CreateImage', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'CreateImageRequest', ], 'output' => [ 'shape' => 'CreateImageResult', ], ], 'CreateInstanceExportTask' => [ 'name' => 'CreateInstanceExportTask', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'CreateInstanceExportTaskRequest', ], 'output' => [ 'shape' => 'CreateInstanceExportTaskResult', ], ], 'CreateInternetGateway' => [ 'name' => 'CreateInternetGateway', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'CreateInternetGatewayRequest', ], 'output' => [ 'shape' => 'CreateInternetGatewayResult', ], ], 'CreateKeyPair' => [ 'name' => 'CreateKeyPair', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'CreateKeyPairRequest', ], 'output' => [ 'shape' => 'KeyPair', ], ], 'CreateLaunchTemplate' => [ 'name' => 'CreateLaunchTemplate', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'CreateLaunchTemplateRequest', ], 'output' => [ 'shape' => 'CreateLaunchTemplateResult', ], ], 'CreateLaunchTemplateVersion' => [ 'name' => 'CreateLaunchTemplateVersion', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'CreateLaunchTemplateVersionRequest', ], 'output' => [ 'shape' => 'CreateLaunchTemplateVersionResult', ], ], 'CreateNatGateway' => [ 'name' => 'CreateNatGateway', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'CreateNatGatewayRequest', ], 'output' => [ 'shape' => 'CreateNatGatewayResult', ], ], 'CreateNetworkAcl' => [ 'name' => 'CreateNetworkAcl', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'CreateNetworkAclRequest', ], 'output' => [ 'shape' => 'CreateNetworkAclResult', ], ], 'CreateNetworkAclEntry' => [ 'name' => 'CreateNetworkAclEntry', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'CreateNetworkAclEntryRequest', ], ], 'CreateNetworkInterface' => [ 'name' => 'CreateNetworkInterface', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'CreateNetworkInterfaceRequest', ], 'output' => [ 'shape' => 'CreateNetworkInterfaceResult', ], ], 'CreateNetworkInterfacePermission' => [ 'name' => 'CreateNetworkInterfacePermission', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'CreateNetworkInterfacePermissionRequest', ], 'output' => [ 'shape' => 'CreateNetworkInterfacePermissionResult', ], ], 'CreatePlacementGroup' => [ 'name' => 'CreatePlacementGroup', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'CreatePlacementGroupRequest', ], ], 'CreateReservedInstancesListing' => [ 'name' => 'CreateReservedInstancesListing', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'CreateReservedInstancesListingRequest', ], 'output' => [ 'shape' => 'CreateReservedInstancesListingResult', ], ], 'CreateRoute' => [ 'name' => 'CreateRoute', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'CreateRouteRequest', ], 'output' => [ 'shape' => 'CreateRouteResult', ], ], 'CreateRouteTable' => [ 'name' => 'CreateRouteTable', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'CreateRouteTableRequest', ], 'output' => [ 'shape' => 'CreateRouteTableResult', ], ], 'CreateSecurityGroup' => [ 'name' => 'CreateSecurityGroup', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'CreateSecurityGroupRequest', ], 'output' => [ 'shape' => 'CreateSecurityGroupResult', ], ], 'CreateSnapshot' => [ 'name' => 'CreateSnapshot', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'CreateSnapshotRequest', ], 'output' => [ 'shape' => 'Snapshot', ], ], 'CreateSpotDatafeedSubscription' => [ 'name' => 'CreateSpotDatafeedSubscription', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'CreateSpotDatafeedSubscriptionRequest', ], 'output' => [ 'shape' => 'CreateSpotDatafeedSubscriptionResult', ], ], 'CreateSubnet' => [ 'name' => 'CreateSubnet', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'CreateSubnetRequest', ], 'output' => [ 'shape' => 'CreateSubnetResult', ], ], 'CreateTags' => [ 'name' => 'CreateTags', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'CreateTagsRequest', ], ], 'CreateVolume' => [ 'name' => 'CreateVolume', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'CreateVolumeRequest', ], 'output' => [ 'shape' => 'Volume', ], ], 'CreateVpc' => [ 'name' => 'CreateVpc', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'CreateVpcRequest', ], 'output' => [ 'shape' => 'CreateVpcResult', ], ], 'CreateVpcEndpoint' => [ 'name' => 'CreateVpcEndpoint', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'CreateVpcEndpointRequest', ], 'output' => [ 'shape' => 'CreateVpcEndpointResult', ], ], 'CreateVpcEndpointConnectionNotification' => [ 'name' => 'CreateVpcEndpointConnectionNotification', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'CreateVpcEndpointConnectionNotificationRequest', ], 'output' => [ 'shape' => 'CreateVpcEndpointConnectionNotificationResult', ], ], 'CreateVpcEndpointServiceConfiguration' => [ 'name' => 'CreateVpcEndpointServiceConfiguration', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'CreateVpcEndpointServiceConfigurationRequest', ], 'output' => [ 'shape' => 'CreateVpcEndpointServiceConfigurationResult', ], ], 'CreateVpcPeeringConnection' => [ 'name' => 'CreateVpcPeeringConnection', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'CreateVpcPeeringConnectionRequest', ], 'output' => [ 'shape' => 'CreateVpcPeeringConnectionResult', ], ], 'CreateVpnConnection' => [ 'name' => 'CreateVpnConnection', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'CreateVpnConnectionRequest', ], 'output' => [ 'shape' => 'CreateVpnConnectionResult', ], ], 'CreateVpnConnectionRoute' => [ 'name' => 'CreateVpnConnectionRoute', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'CreateVpnConnectionRouteRequest', ], ], 'CreateVpnGateway' => [ 'name' => 'CreateVpnGateway', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'CreateVpnGatewayRequest', ], 'output' => [ 'shape' => 'CreateVpnGatewayResult', ], ], 'DeleteCustomerGateway' => [ 'name' => 'DeleteCustomerGateway', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'DeleteCustomerGatewayRequest', ], ], 'DeleteDhcpOptions' => [ 'name' => 'DeleteDhcpOptions', 'http' => [ 'method