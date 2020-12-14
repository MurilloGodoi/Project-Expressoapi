CREATE DATABASE [expressoapi]
USE [expressoapi]
GO
/****** Object:  Table [dbo].[apis]    Script Date: 10/12/2020 15:35:17 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[apis](
	[Id] [int] IDENTITY(1,1) NOT NULL,
	[Name] [varchar](50) NOT NULL,
 CONSTRAINT [PK_api] PRIMARY KEY CLUSTERED 
(
	[Id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[plans]    Script Date: 10/12/2020 15:35:17 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[plans](
	[Id] [int] IDENTITY(1,1) NOT NULL,
	[Name] [varchar](50) NULL,
	[RequestsQuantity] [int] NULL,
	[Price] [decimal](10, 2) NULL,
 CONSTRAINT [PK_planId] PRIMARY KEY CLUSTERED 
(
	[Id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[user_api_requests]    Script Date: 10/12/2020 15:35:17 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[user_api_requests](
	[Id] [int] IDENTITY(1,1) NOT NULL,
	[userId] [int] NOT NULL,
	[planId] [int] NOT NULL,
	[DtRequest] [datetime] NULL,
	[Url] [varchar](300) NULL,
	[Body] [varchar](300) NULL,
	[ResponseStatus] [int] NULL,
	[ResponseBody] [varchar](300) NULL,
	[PostActions] [varchar](300) NULL,
 CONSTRAINT [PK_UserRequestId] PRIMARY KEY CLUSTERED 
(
	[Id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[user_configurations]    Script Date: 10/12/2020 15:35:17 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[user_configurations](
	[userId] [int] NOT NULL,
	[SMTPUsername] [varchar](300) NULL,
	[SMTPHost] [varchar](50) NULL,
	[SMTPPassword] [varchar](50) NULL,
	[SMTPPort] [int] NULL,
	[TrackingEmailTemplate] [varchar](max) NULL,
	[TrackingEmailEventTemplate] [varchar](max) NULL,
 CONSTRAINT [PK_userId] PRIMARY KEY CLUSTERED 
(
	[userId] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[user_plan_histories]    Script Date: 10/12/2020 15:35:17 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[user_plan_histories](
	[Id] [int] IDENTITY(1,1) NOT NULL,
	[UserId] [int] NOT NULL,
	[PlanId] [int] NOT NULL,
	[DtStart] [date] NULL,
	[DtEnd] [date] NULL,
 CONSTRAINT [PK_UserHistories] PRIMARY KEY CLUSTERED 
(
	[Id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[user_plans]    Script Date: 10/12/2020 15:35:17 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[user_plans](
	[userId] [int] NOT NULL,
	[planId] [int] NOT NULL,
	[SMSCredits] [int] NULL,
 CONSTRAINT [PK_userplans] PRIMARY KEY CLUSTERED 
(
	[userId] ASC,
	[planId] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[userapi]    Script Date: 10/12/2020 15:35:17 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[userapi](
	[userId] [int] NOT NULL,
	[ApiId] [int] NOT NULL,
	[Username] [varchar](300) NULL,
	[Password] [varchar](100) NULL,
 CONSTRAINT [PK_userapi] PRIMARY KEY CLUSTERED 
(
	[userId] ASC,
	[ApiId] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[users]    Script Date: 10/12/2020 15:35:17 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[users](
	[Id] [int] IDENTITY(1,1) NOT NULL,
	[email] [varchar](300) NULL,
	[password] [varchar](300) NULL,
	[accessToken] [varchar](100) NULL,
	[document] [varchar](20) NULL,
	[name] [varchar](200) NULL,
	[phone] [varchar](20) NULL,
 CONSTRAINT [PK_user] PRIMARY KEY CLUSTERED 
(
	[Id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
ALTER TABLE [dbo].[user_api_requests]  WITH CHECK ADD  CONSTRAINT [FK_UserApiRequests_PlanId] FOREIGN KEY([planId])
REFERENCES [dbo].[plans] ([Id])
GO
ALTER TABLE [dbo].[user_api_requests] CHECK CONSTRAINT [FK_UserApiRequests_PlanId]
GO
ALTER TABLE [dbo].[user_api_requests]  WITH CHECK ADD  CONSTRAINT [FK_UserApiRequests_UserId] FOREIGN KEY([userId])
REFERENCES [dbo].[users] ([Id])
GO
ALTER TABLE [dbo].[user_api_requests] CHECK CONSTRAINT [FK_UserApiRequests_UserId]
GO
ALTER TABLE [dbo].[user_configurations]  WITH CHECK ADD  CONSTRAINT [FK_UserConfigurations_userId] FOREIGN KEY([userId])
REFERENCES [dbo].[users] ([Id])
GO
ALTER TABLE [dbo].[user_configurations] CHECK CONSTRAINT [FK_UserConfigurations_userId]
GO
ALTER TABLE [dbo].[user_plan_histories]  WITH CHECK ADD  CONSTRAINT [FK_UserPlanHistories_PlanId] FOREIGN KEY([PlanId])
REFERENCES [dbo].[plans] ([Id])
GO
ALTER TABLE [dbo].[user_plan_histories] CHECK CONSTRAINT [FK_UserPlanHistories_PlanId]
GO
ALTER TABLE [dbo].[user_plan_histories]  WITH CHECK ADD  CONSTRAINT [FK_UserPlanHistories_UserId] FOREIGN KEY([UserId])
REFERENCES [dbo].[users] ([Id])
GO
ALTER TABLE [dbo].[user_plan_histories] CHECK CONSTRAINT [FK_UserPlanHistories_UserId]
GO
ALTER TABLE [dbo].[user_plans]  WITH CHECK ADD  CONSTRAINT [FK_planid] FOREIGN KEY([planId])
REFERENCES [dbo].[plans] ([Id])
GO
ALTER TABLE [dbo].[user_plans] CHECK CONSTRAINT [FK_planid]
GO
ALTER TABLE [dbo].[user_plans]  WITH CHECK ADD  CONSTRAINT [FK_userid] FOREIGN KEY([userId])
REFERENCES [dbo].[users] ([Id])
GO
ALTER TABLE [dbo].[user_plans] CHECK CONSTRAINT [FK_userid]
GO
ALTER TABLE [dbo].[userapi]  WITH CHECK ADD  CONSTRAINT [FK_apiid] FOREIGN KEY([ApiId])
REFERENCES [dbo].[apis] ([Id])
GO
ALTER TABLE [dbo].[userapi] CHECK CONSTRAINT [FK_apiid]
GO
ALTER TABLE [dbo].[userapi]  WITH CHECK ADD  CONSTRAINT [FK_UserApi_userid] FOREIGN KEY([userId])
REFERENCES [dbo].[users] ([Id])
GO
ALTER TABLE [dbo].[userapi] CHECK CONSTRAINT [FK_UserApi_userid]
GO
